<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PinikleService;
use App\Http\Controllers\PinikleServiceController;

class PinikleServiceController extends Controller
{
    //
    protected $refid;
    protected $gateway;
    private $PinikleService;
    public function __construct(PinikleService $PinikleService){
        $this->PinikleService =  $PinikleService;
    }
    public function listOfPayments(Request $request){
        $data =[
            'amount'=>$request->price,
            'currency'=>'USD',
            'mobileNumber'=>Auth::user()->mobileNumber,
            'email'=>Auth::user()->email,
            "firstName"=>Auth::user()->firstName,
            "lastName"=>Auth::user()->lastName,
            "success_url"=>'http://127.0.0.1:8000/paid',
            'fail_url'=>'http://127.0.0.1:8000/fail',
            'cancel_url'=>'http://127.0.0.1:8000/cancel',
        ];
        return $this->PinikleService->getListOfPayments($data);
    }
    public function pay(Request $request)
    {
        $this->refid = $request->refid;
        $this->gateway = $request->gateway;
        $data =[
            "refid"=>$request->refid,
            "gateway"=>$request->gateway,
            "subPaymentId"=>$request->subPaymentId
        ];
        return $this->PinikleService->sendPayment($data);
    }

    public function paymentCallBack()
    {
        $data=[
            "refid"=>$this->refid,
            "gateway"=>$this->gateway
        ];
    
        $this->PinikleService->getPaymentStatus($data);
    }


    public function loadViewPaid(){

        return view('paid');
    }
    public function loadViewfail(){
        return view('fail');
    }
}
