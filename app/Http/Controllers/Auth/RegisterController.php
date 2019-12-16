<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
function GetRandomString($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        
        $passwd = $data['password'];
        $to_name = $data['name'];
        $to_email = $data['email'];
        error_log($data['email']);
        
        $rules = \App\Rules::all()->first();
        error_log($rules->AllowUser);
        
        $VerifyCode = GetRandomString();
        if($rules->AllowUser == 1)
        {
            

            $infoData = ['name'=>$to_name, "link" => $VerifyCode];

            Mail::send('VerifyMail', ['code' => $VerifyCode], function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                        ->subject('Verify your Email');
                $message->from('supastrobucket@gmail.com','Astrobucket');
            });
        }
        $user = User::create([
            'name' => $to_name,
            'email' => $to_email,
            'password' => Hash::make($passwd),
        ]);

        error_log($user);
        \DB::table('VerifyMail')->insert([
            ['UID' =>$user->id, 'VID' => $VerifyCode],
            ]);
        return $user;
    }

    


  
}
