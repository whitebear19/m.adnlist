<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    { 
        try {      
            
            $getInfo = Socialite::driver($provider)->user();
            $user = $this->createUser($getInfo,$provider);    
            auth()->login($user);    
            return redirect()->to('/')->with("login_success","ok"); 
            
        } 
        catch (Exception $e) {
            return redirect()->to('/');
        }
 
    }

    function createUser($getInfo,$provider){
 
        $user = User::where('email', $getInfo->email)->first();
        $fname = "";            
        $lname = "";   
        $findspace = " ";
        $fullname = $getInfo->name;
        $pos = strpos($fullname,$findspace);
        $fullname_len = strlen($fullname);
        if($pos === false)
        {
            $fname = "";            
            $lname = "";            
        }
        else
        {
            $fname = substr($fullname,0,$pos);
            $lname = substr($fullname,$pos+1,$fullname_len);
        }
        
        if (!$user) {
            $user = User::create([
               'fname'       => $fname,
               'lname'       => $lname,               
               'name'        => $getInfo->name,
               'email'       => $getInfo->email,
               'provider'    => $provider,
               'provider_id' => $getInfo->id,
               'password'    => md5(rand(1,10000)),
               'role'        => "0",
               'receive_b_s' => "0",
               'verifytext'  => "",
               'phone_code'  => "",
               'status'      => "1",
               'email_verified_at' => date('Y-m-d H:i:s', time())               
           ]);
         }
         return $user;
      }
}
