<?php

namespace App\Http\Controllers\Admin;

use App\Models\Developer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate('admin');

        $request->session()->regenerate();
        session()->put('is_admin','yes');
        return redirect()->intended(route('admin.home'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        session()->forget('is_admin');

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    //return vendor list

    public function vendors()
    {
        $vendors = Developer::all();

        return view('vendors.list', compact('vendors'));
    }
    public function editvendor($id=null)
    {
        $vendor = Developer::where('id',$id)->first();

        return view('vendors.eidt',compact('vendor'));
    }
    public function addVendor(Request $request)
    {
        
        if($request->isMethod("post")){
            $request->validate(
                [
                'name' => 'required',
                'phone' => 'required|unique:developers|integer',
                'password' => 'required',
                'email' =>'unique:developers'
                ]
            );
            $data= $request->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['email'])){
                
                $data['email'] ="Null";
                
            }
            $vendor = New Developer;
            $vendor->name = $data['name'];
            $vendor->email = $data['email'];
            $vendor->phone = $data['phone'];
            $vendor->password = Hash::make($data['password']);
            $vendor->status= $data['status'];
            $vendor->save();
            return redirect()->back()->with('success','Vendor Added Successfully');
        }
        return view('vendors.add');
    }

    public function updateVendor (Request $request,$id=null)
    {
        $data = $request->all();
        if(empty($data['password'])){
            $vendordata = Developer::where('id',$id)->first();
            $password = $vendordata->password;
        }else{
            $password = Hash::make($data['password']);
        }
        Developer::where('id',$id)->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'password'=>$password,
            'status'=>$data['status'],
        ]);
        return redirect()->back()->with('success','Vendor Update Successfully');
    }
}