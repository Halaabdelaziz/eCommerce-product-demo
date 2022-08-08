<?php
namespace App\Http\Repositories;

use App\Models\Product;
use App\Http\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface{
    public function index(){
        $products = Product::all();
        return view('product.index',compact('products'));
    }
    public function create(){}
    public function store($request){
        $product = new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imagefilesaving = time().'.'.$extension;
            $path = $request->file('image')->move(public_path('images'), $imagefilesaving);
            $product->image=$imagefilesaving;
        }
        $product->save();

        return redirect()->route('product');
    }
    public function edit($id){}
    public function update($request, $id){}
    public function destroy($id){}
}