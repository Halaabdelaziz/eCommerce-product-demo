<?php
namespace App\Http\Services;

use GuzzleHttp\Client;
use App\Models\Transaction;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;    


class PinikleService{
    
    private $base_url;
    private $headers;
    private $request_client;

    public function __construct(Client $request_client){
        $this->request_client = $request_client;

        $this->base_url= env('Pinikle_base_url');   
        $this->headers =[
            'Content-Type'=>'application/json',
            'authorization'=>'Bearer '.env('Pinikle__token')
        ];
    }

    private function buildRequest($uri,$method,$data){
        $request = new Request($method,$this->base_url.$uri,$this->headers);

        if(!$data){
           // return false;
        }
        $response = $this->request_client->send($request, [
            'json'=>$data   
        ]);
        if($response->getStatusCode() !=200){
         //  return false;
        }
        $response =json_decode($response->getBody(),true);
        return $response;
    }

    public function getListOfPayments($data){
        $response = $this->buildRequest('api/listOfPayments','POST',$data);
        $refid = $response['refid'];
        $res = $response['data'];

        return view('transaction',compact('res','refid'));
    }

    public function sendPayment($data){

        $response = $this->buildRequest('api/initiatePayment','POST',$data);
        $redirect_url = $response['data']['redirect_url'];

        Transaction::create([
            'invoice_number'=> $response['data']['invoice_number'],
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->away($redirect_url);
    }


    public function getPaymentStatus($data){ 
        $res = $this->buildRequest('api/checkPaymentStatus','POST',$data);
        if($res['success']==true && $res['data']['status']=="paid"){
            return redirect()->away('http://127.0.0.1:8000/paid');
        }
        else{
            return redirect()->away('http://127.0.0.1:8000/fail');
        }
       
    }

}