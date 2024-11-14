<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required | numeric | digits:11 | starts_with: 0'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function register(Request $request)
    {

        $isExist = \App\Models\User::select("*")
            ->where("mobile", $request->mobile)
            ->exists();

        if ($isExist) {
            $otpnew = mt_rand(10, 1000000);
            \App\Models\User::where('mobile', $request->mobile)->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'otp' => $otpnew,
                'facebook' => $request->facebook,
                'country' => $request->country,
                'district' => $request->district,
                'password' => Hash::make($request->password),
                'verification_code' => sha1(time())
            ]);

            MailController::sendSignupEmail($request->name, $request->email, sha1(time()));
//            return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
            $url = 'https://msg.elitbuzz-bd.com/smsapi';
            $data = [
                "api_key" => 'C2008725655f344001f802.53656118',
                "type" => 'text',
                "contacts" =>  $request->mobile,
//    "senderid" => '8809612446951',
                "senderid" => '8809601011270',
                "msg" => 'Your OTP for WE Official is '.$otpnew,
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            return redirect()->route('otpsms',$request->mobile)->with(session()->flash('alert-success', 'Please check email for verification link.!'));
//            return redirect()->route('signin')->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.!'));

        }else{
//            dd('Record is not available.');
            $request->validate([
                'name' => 'required',
//            'mobile' => 'required|digits:11|starts_with:0|unique:users',
                'mobile' => 'required|starts_with:0|unique:users',
                'password' => 'required|min:8',
                'email' => 'required|email|unique:users'
            ]);
            $otp = mt_rand(10, 1000000);
            $mobile = '88'.$request->mobile;
            $user = new \App\Models\User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile =$request->mobile;
            $user->otp = $otp;
            $user->facebook = $request->facebook;
            $user->country = $request->country;
            $user->district = $request->district;
            $user->password = Hash::make($request->password);
            $user->verification_code = sha1(time());
            $user->save();

            if($user != null){
                MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
//            return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
                $url = 'https://msg.elitbuzz-bd.com/smsapi';
                $data = [
                    "api_key" => 'C2008725655f344001f802.53656118',
                    "type" => 'text',
                    "contacts" =>  $request->mobile,
//    "senderid" => '8809612446951',
                    "senderid" => '8809601011270',
                    "msg" => 'Your OTP for WE Official is '.$otp,
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                return redirect()->route('otpsms',$request->mobile)->with(session()->flash('alert-success', 'Please check email for verification link.!'));
//            return redirect()->route('signin')->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.!'));



            }
        }



        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }

    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = \App\Models\User::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = 1;
            $user->email_verified_at = time();
            $user->save();
            return redirect()->route('signin')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }

        return redirect()->route('signin')->with(session()->flash('alert-danger', 'Invalid verification code!'));

    }

    public function resendotp(Request $request){
        $mobile = $request->mobile;
        $user = \App\Models\User::where(['mobile' => $mobile])->first();
        if($user != null){
            $otpnew = mt_rand(10, 1000000);
            \App\Models\User::where('mobile', $request->mobile)->update([
                'otp' => $otpnew
            ]);

            $url = 'https://msg.elitbuzz-bd.com/smsapi';
            $data = [
                "api_key" => 'C2008725655f344001f802.53656118',
                "type" => 'text',
                "contacts" =>  $request->mobile,
//    "senderid" => '8809612446951',
                "senderid" => '8809601011270',
                "msg" => 'Your OTP for WE Official is '.$otpnew,
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);

            return redirect()->route('otpsms',$mobile)->with(session()->flash('alert-success', 'OTP sent on your mobile!'));
        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Invalid Mobile Number!'));
    }

    public function verifyotp(Request $request){
        $verification_code = $request->otp;
        $user = \App\Models\User::where(['otp' => $verification_code])->first();
        if($user != null){
            $user->is_verified = 1;
            $user->email_verified_at = time();
            $user->save();
            return redirect()->route('signin')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Invalid OTP code!'));
    }


    public function otpreset(Request $request){
        $verification_code = $request->otp;
        $user = \App\Models\otpreset::where(['otp' => $verification_code])->first();
        if($user != null){
//            $user->is_verified = 1;
//            $user->email_verified_at = time();
//            $user->save();
            return redirect()->route('passwordotp.reset',$verification_code);
        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Invalid OTP code!'));
    }


}