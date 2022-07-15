<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    function view(){
        $orders = Order::where('vendor_id',session('vendor_id'))->get();
        return view('orders.order',compact('orders'));
    }
    
    public function add( Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'cus_name' => 'required',
                    'product_name'=> 'required',
                    'address'=> 'required',
                    'quantity'=> 'required',
                    'cus_phone'=> 'required',
                    'product_price'=> 'required',
                    
                ],
                [
                    'cus_name.required' => 'Enter :attribute First',
                    'cus_phone.required' => 'Enter :attribute First',
                    'address.required' => 'Enter :attribute First',
                    'product_price.required' => 'Enter :attribute First',
                    'quantity.required' => 'Enter :attribute First',
                    'product_name.required' => 'Enter :attribute Exits'
                ]
            );
            $data = $request->all();
            // Create Unique Refer Id
            // $ids = Order::pluck('refer_code');
            // Generate a new unique number
            do {
                $refer_code = rand(1000, 9999);
            } while (Order::where('refer_code', "=", $refer_code)->first() instanceof Order);

            $order = new Order;
            $order->cus_name = $data['cus_name'];
            $order->vendor_id = session('vendor_id');
            $order->cus_phone = $data['cus_phone'];
            $order->address = $data['address'];
            $order->payment_status = $data['payment_status'];
            $order->order_status = "Active";
            $order->product_name = $data['product_name'];
            $order->product_price = $data['product_price'];
            $order->quantity = $data['quantity'];
            $order->refer_code = $refer_code;
            $order->order_note = $data['order_note'];
            $order->save();

            return back()->with("success","Order Added Successfully!");
        }
       
        
        return view('orders.add');
    }

    public function update(Request $request, $order_id=Null)
    {
        
        if($request->isMethod('post')){
            $data = $request->all();

            Order::where(['id'=>$order_id])->update([
                'cus_name'=>$data['cus_name'],
                'cus_phone'=>$data['cus_phone'],
                'address'=>$data['address'],
                'payment_status'=>$data['payment_status'],
                'product_name'=>$data['product_name'],
                'quantity'=>$data['quantity'],
                'product_price'=>$data['product_price'], 
                'order_note' => $data['order_note']
            ]);
            return redirect()->back()->with('success','Order Update Successfully');
        }

        if(session('is_admin') == 'yes'){
            $order = Order::where('id',$order_id)->count();
            if($order >0){
                $order = Order::where('id',$order_id)->first();
                return view('orders.edit')->with(compact('order'));
            }else{
                return Redirect::back()->with('error', 'No Order Founds');
            }
                
        } else{
            $order = Order::where('vendor_id',session('vendor_id'))->where('id',$order_id)->count();
            if($order >0){
                $order = Order::where('vendor_id',session('vendor_id'))->where('id',$order_id)->first();
                return view('orders.edit')->with(compact('order'));
            } else{
                // return view('orders.order')->with("error","No order Founds");
                return Redirect::back()->with('error', 'No Order Founds');
            }
        }

    }

    //Delete order data
    public function delete($id=null)
    {
        if(session('is_admin') == 'yes'){
            $order = Order::where(['id'=>$id])->count();
            if($order>0){
                $order = Order::where(['id'=>$id])->delete();
                return redirect()->back()->with('success','Order has been deleted Successfully!');
            }else{
                return redirect()->back()->with('error','Sorry! No Order Founds');
            }
            
        }else{
            $order = Order::where('vendor_id',session('vendor_id'))->where('id',$id)->count();
            if($order >0){
                $order = Order::where('vendor_id',session('vendor_id'))->where('id',$id)->delete();
                return redirect()->back()->with('success','Order has been deleted Successfully!');
            } else{
                // return view('orders.order')->with("error","No order Founds");
                return Redirect::back()->with('error', 'No Order Founds');
            }
        }
    }
    // admin view and works

    function orderlist(){
        $orders = Order::all();
        return view('orders.order',compact('orders'));
    }
    
}
