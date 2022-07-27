<?php

namespace App\Http\Controllers\Developer;

use Carbon\Carbon;
use App\Models\Developer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  public function store(Request $request)
  {

    if($request->isMethod('post')){
      $data = $request->all();

      $userStatus= Developer::where('phone',$data['phone'])->first();

      // echo $userStatus
      if(Hash::check($data['password'], $userStatus->password)){
        if($userStatus->status==0){
          return redirect()->back()->with('flash_login_massage_error','Please activate your Account before login');
        }else if($userStatus->status==3|| Carbon::now() > $userStatus->expair_at){
          return redirect()->back()->with('flash_login_massage_error',"You can't able to login. Please Contact with Woner. Token No:      $userStatus->id");
        }
        else if($userStatus->status==1){
          Auth::guard('developer')->attempt(['phone' => $data['phone'], 'password' => $data['password']]);
          session()->put('vendor_id',$userStatus->id);
          return redirect()->intended(route('developer.home'));
        } 
      
      } else{
        throw ValidationException::withMessages([
          'phone' => __('auth.failed'),
          
      ]);
      }
    }
    
  }
  public function register(Request $request)
  {
    //   $data = $request->all();
    //   dd($data);
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => ['required','string','regex:/(^(01){1}[3-9]{1}\d{8})$/','unique:developers'],
        'password' => 'required|string|confirmed|min:6',
        
    ]);  
      $code=rand(1000,9999);         
      $data= $request->all();
      $url = "http://66.45.237.70/api.php";
      $number="$request->phone";
      // echo $number;die;
      
      $data= array(
        'username'=>"rakib7299",
        'password'=>"sazzas7299",
      'number'=>"+88$number",
      'message'=>"Your Registration Verification Code is $code"
      );
      $ch = curl_init(); // Initialize cURL
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $smsresult = curl_exec($ch);
      $p = explode("|",$smsresult);
      $sendstatus = $p[0];
      // echo "<pre>"; print_r($smsresult); die;
      Developer::create([
        'name' => $request->name,
        'password' => Hash::make($request->password),
        'phone'=>$request->phone,
        'code'=>$code,
        'expair_at' => Carbon::now()->addDays(5),
      ]);
      $id = DB::getPdo()->lastInsertId();
      $userdata = Developer::where('id',$id)->first();
      // echo "<pre>"; print_r($userdata); die;
      
      // User Verify By Email Account
       
      // $email =$data['email'];
      // $messageData = ['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($email)];
      // Mail::send('auth.email.verify',$messageData,function($message) use($email){
      //     $message->to($email)->subject('Verify Your Email!');
      // });


    return redirect('/vendor/verify?phone='.$userdata->phone)->with('success','Account has been Successfully, Please Verify Your Code');
    
  
        // echo "<pre>"; print_r($date);die;

  }
  public function verifiedcode(Request $request){

    if($request->isMethod('post')){
   $phone = $request->phone;
    $userCount = Developer::where('phone',$phone)->where('code',$request->code)->count();
    if($userCount > 0){
      Developer::where('phone',$phone)->update([
        'code'=>NULL,
        'status'=>1,
      ]);
      return redirect()->route('developer.login')->with('success','Account Activate Successfully, Please Loged in');
    } else{
      return redirect()->back()->with('error', 'Faild! Insert the correct code');
    }
    }
    return view('auth.verifyCode');
  }
  public function resendcode(Request $request)
  {
    if($request->isMethod('post')){
      $developerCount = Developer::where(['phone'=>$request->phone])->count();
      if($developerCount>0){
        $developer = Developer::where(['phone'=>$request->phone])->first();
        $code=rand(1000,9999); 
        
        Developer::where(['phone'=>$request->phone])->update(['code'=>$code]);

        $url = "http://66.45.237.70/api.php";
        $number="+880$developer->phone";
        
        $data= array(
        'username'=>"rakib7299",
        'password'=>"sazzas7299",
        'number'=>"$number",
        'message'=>"Your Registration Verification Code is $code"
        );
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
      }
      return redirect()->back()->with('success', 'New Code send to your contact number');
    }
    return redirect()->route('developer.login');
  }

  //Registration VErification my gmail
  public function verified($code)
    {
      $email =base64_decode($code);
      $userCount = Developer::where('email',$email)->count();
      if($userCount > 0){
        $userDetails = Developer::where('email',$email)->first();
        if($userDetails->status==1){
          return redirect()->route('developer.login')->with('warning','Your Email Account already verified. You can Login');
        }
        else{
          Developer::where('email',$email)->update(['email_verified_at'=>Carbon::now(),'status'=>1]);
          return redirect()->route('developer.login')->with('success','Your Email Account has been verified successfully. You can Login');
      }
      }
    }
    public function forget()
    {
      return view('auth.passwords.forget');
    }
    public function generatePassword(Request $request)
    {
      $developerCount = Developer::where(['phone'=>$request->phone])->count();
      if($developerCount>0){
        $developer = Developer::where(['phone'=>$request->phone])->first();
        $random_pss= Str::random(8);
        $new_password = Hash::make($random_pss);
        Developer::where(['phone'=>$request->phone])->update(['password'=>$new_password]);

        $url = "http://66.45.237.70/api.php";
        $number="+880$developer->phone";
        
        $data= array(
        'username'=>"rakib7299",
        'password'=>"sazzas7299",
        'number'=>"$number",
        'message'=>"Your New Password is $random_pss"
        );
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];

        //ACV28S7M
        // $name = $developer->name;
        // // echo "<pre>";print_r($userDetail->name);die;

        // // Send Random password to user by Mail
        // $email = $request->email;
        // $messageData=[
        //     'name'=>$name,
        //     'email'=>$email,
        //     'password'=>$random_pss
        // ];
        // Mail::send('auth.email.newpassword',$messageData,function($message) use($email){
        //     $message->to($email)->subject('Reset Password '.env("APP_NAME").' ');
        // });
        return redirect()->route('developer.login')->with('success','Password Reset Successfully. Please check email Mail');

      }else{
        throw ValidationException::withMessages([
          'phone' => __('auth.failed'),
        ]);
      }
    }
  public function profile(){
    $id = Auth::id();
    // echo "<pre>"; print_r($id);die;
    $userdata = Developer::where('id',$id)->first();
    return view('profile',compact('userdata'));
  }
  public function destroy(Request $request)
    {
        Auth::guard('developer')->logout();
        session()->forget('vendor_id');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('developer.login');
    }
    function changepass(Request $request){
      if($request->isMethod('post')){
        $request->validate([
          'password' => 'required|string|confirmed|min:8',
          ]); 
          // get data form request
          $data =$request->all();
          $userStatus= Developer::where('id',session('vendor_id'))->first();

          // echo "<pre>"; print_r($userStatus);die;

        // echo $userStatus
        if(Hash::check($data['current_password'], $userStatus->password)){
          $password = Hash::make($data['password']);
          Developer::where('id', session('vendor_id'))->update(['password'=>$password]);
          return redirect()->back()->with('success', 'Update Password');
        }else{
          throw ValidationException::withMessages([
            'current_password' => __('auth.failed'),
          ]);
        }
        
      }
      return redirect()->route('developer.profile');
    }
}
