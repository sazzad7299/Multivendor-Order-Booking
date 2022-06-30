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
    public function add()
    {
        
        return view('orders.add');
    }
    public function store( Request $request){
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
        if ($request->isMethod('post')) {
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
        }
        return back()->with("success","Order Added Successfully!");
    }
    public function edit($order_id)
    {
        
        $order = Order::where('vendor_id',session('vendor_id'))->where('id',$order_id)->count();
        if($order >0){
            $order = Order::where('vendor_id',session('vendor_id'))->where('id',$order_id)->first();
            return view('orders.edit')->with(compact('order'));
        } else{
            // return view('orders.order')->with("error","No order Founds");
            return Redirect::back()->with('flash_login_massage_error', 'No Order Founds');
        }

    }
}
