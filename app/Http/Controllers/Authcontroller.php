<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\PasswordReset;
use Mail;
use Illuminate\Support\str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;


class Authcontroller extends Controller
{


public function register(Request $request){
    // Validate request data
    $validator = Validator::make($request->all(), [
        "username" => "string|required",
        "email" => "email|required|unique:users",
        "password" => "required|string"
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Create a new user
    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    return redirect('/loginn')->with('success', 'User registered successfully! Please Login.');
}




    public function loadLogin(){
        if(Auth::user() && Auth::user()->role == 'superAdmin'){
            return redirect('/super-admin/dashboard');

        }
        elseif(Auth::user() && Auth::user()->role == 'admin'){
            return redirect('/admin/dashboard');
            
        }
        elseif(Auth::user() && Auth::user()->role == 'student'){
            return redirect('/student/dashboard');
            
        }
        return view('login');
    }




    public function userlogin(Request $request){
        $request->validate([
            "email" => "email|required",
            "password" => "required|string"
        ]);

        $userCridential = $request->only('email','password');

        if(Auth::attempt($userCridential)){
            if(Auth::user()->role=='superAdmin'){
                return redirect('/super-admin/dashboard');

            }elseif(Auth::user()->role=='admin'){
                return redirect('/admin/dashboard');

            }else{
                return redirect('/student/dashboard');

            }
        }else{
            return back()->withErrors('User Not found!');
        }
    }


    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/loginn')->with('success', 'You have been successfully Logout.');

    }

    public function forgetPasswordLoad(){
        return view('forgetPassword');
    }

    public function forgetPassword(Request $request){
        try{
            $user = User::where('email', $request->email)->get();

            if(count($user) > 0){
                $token = str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;
                
                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['tittle'] = "Password Reset";
                $data['body'] = "Please click on link below to reset password.";

                Mail::send('forgetPasswordMail',['data'=>$data], function($message) use ($data){
                    $message->to($data['email'])->subject($data['tittle']);
                });

                $dateTime = Carbon::now()->format('Y-m-d H:i:s');
                PasswordReset::updateOrCreate(
                    ['email'=>$request->email],
                    [
                        'email'=>$request->email,
                        'token'=>$token,
                        'created_at'=> $dateTime
                    ]
                    );
                return back()->with('success','Check your mail to reset your password.');



            }else{
                return back()->with('error','Email Not Found!');

            }

    
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function resetPasswordLoad(Request $request){
        $resetData = PasswordReset::where('token', $request->token)->get();

        if(isset($request->token) && count($resetData) > 0){
            $user = User::where('email', $resetData[0]['email'])->get();
            return view('resetPassword', compact('user'));
            
        }else{
            return redirect('/loginn');
        }




    }
    public function resetPassword(Request $request){
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::find($request->userid);
        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email',$user->email)->delete();
        return "password reset successfully";

    }
}
