<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request){
        //$request->validated();
        $orders = new Order(); 
        $orders->Name = $request->name;
        $orders->Email = $request->email;
        $orders->Phone = $request->phone;
        $orders->Address = $request->address;
        $orders->Product = $request->product;
        $orders->Quantity = $request->quantity;
        $orders->DeliveryDate = $request->delivery;
        $orders->save();
        return redirect()->back()->with('action',0);
 }

 public function show(){
    $orders = Order::get();
    return view('all_orders',compact('orders'));
 }

 public function destroy($id){
    Order::where('id',$id)->delete();
     return redirect()->back();
 }

 public function edit($id){
     $orderss=Order::where('id',$id)->get();
     $orders=Order::get();
     $action = 1;
     return view('create_order',compact(['action' ,'orders','orderss' ]));
 }

 public function update(UpdateOrderRequest $request,$id){
    //$request->validate();
    Order::where('id',$id)->update([
        'Name' => $request->name,
        'Email' => $request->email,
        'Phone' => $request->phone,
        'Address' => $request->address,
        'Product' => $request->product,
        'Quantity' => $request->quantity,
        'DeliveryDate' => $request->delivery
    ]);
     $action = 0;
     $orders=Order::get();
     return view('create_order',compact(['action','orders']));
 }


}
