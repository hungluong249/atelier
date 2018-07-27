<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Mail;

class ContactApiController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
    }

    public function sendMail(){
    	$name = Input::get('name');
        $email = Input::get('email');
        $content = Input::get('content');
        $data = array('name' => $name, 'email' => $email, 'content' => $content);
        Mail::send('admin/subscribe/mailfb', array('name' => $name, 'email' => $email, 'content' => $content), function($message) use ($data){
        	
            $message->to('minhtruong93gtvt@gmail.com', 'Visitor')->subject('[Atelier31.vn] Mail form website');
        });
    	

    	// if($result != null){
     //        return response()->json(['message' => 'success'], 200);
     //    }else{
     //        return response()->json(['message' => 'fail'], 200);
     //    }
    }
}
