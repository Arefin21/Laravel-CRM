<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use App\Mail\ActiveEmail;
use App\Mail\PasswordEmail;
use App\Mail\SubscriberNumberEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function sendActiveUserEmail($name, $email, $verification_code,$subscription_id){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
            'subscription_id' => $subscription_id
        ];
        Mail::to($email)->send(new ActiveEmail($data));
    }

    public static function sendPasswordUserEmail($name, $email, $password){
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        Mail::to($email)->send(new PasswordEmail($data));
    }


//    public static function sendSubscriberNumberEmail($name, $email, $subscriber_number){
//        $data = [
//            'name' => $name,
//            'email' => $email,
//            'subscriber_number' => $subscriber_number
//        ];
//
//        Mail::to($email)->send(new SubscriberNumberEmail($data));
//    }
    public static function sendSubscriberNumberEmail($email,$subscriber_number){
        $data = [
            'email' => $email,
            'subscriber_number' => $subscriber_number
        ];

        Mail::to($email)->send(new SubscriberNumberEmail($data));
    }

}