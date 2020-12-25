<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{




    //Function  to dispaly all orders

    public function index(){
        $orders=Order::all();
        return view('dashboard.orders.index',['orders'=>$orders]);
    }



   // function to store new order

   public function store(Request $request){

    $this->validate($request , [
     'phone' => 'string|min:10|max:25|required',
     'cost' => 'required',
     'username' => 'string|min:5|max:30',
     'address' =>'string|min:10|max:100',
     'product' => 'string',
     'amount' => 'integer'
    ]);

    $order=Order::create([
        'username' => $request['username'],
        'phone' => $request['phone'],
        'address' => $request['address'],
        'product' => $request['product'],
        'amount' => $request['amount'],
        'cost' => $request['cost'],
        'user_id' => $request['userid']
    ]);


     session()->flash('success','Order has been confirmed successfully');
     return redirect(route('home'));

   }


   // function to delete orders

    public function delete($id){
       $order=Order::findOrFail($id);
       $order->delete();
        session()->flash('success','Order has been Deleted successfully');
        return redirect(route('dashboard.index'));
    }


    //function to show single Order
    public function show($id){

    }




}
