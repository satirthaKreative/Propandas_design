<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
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
    // protected $redirectTo = '/home';
    public function redirectTo()
    {
        return '/verification';
    }

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
            'email' => ['required', 'string', 'email', 'max:255'],
            'phn_num' => ['required'],
            'city' => ['required'],
            'zipcode' => ['required'],
            'country' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        Session::put('mysession', $data['email']);
        if($data['is_lawyer'] == '0'){
        $arr = [
            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'degree' => $data['degree'],
            'phn_num' => $data['phn_num'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'zipcode' => $data['zipcode'],
            'country' => $data['country'],
            'timezone' => $data['timezone'],
            'is_lawyer' => $data['is_lawyer']
        ];
        }
        else if($data['is_lawyer'] == '1')
        {
            $file = $data['upload']; 
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $enc_type = $file->getClientOriginalExtension();
            if($enc_type == 'docx' || $enc_type == 'doc' || $enc_type == 'pdf' || $enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
            {
                $real_path = $file->getRealPath();
                $file_size = $file->getSize();
                $meme_type = $file->getMimeType();
                $destinationPath = 'uploads/lawyer_doc';
                $file->move($destinationPath,$file->getClientOriginalName());

                $myActualPath = $destinationPath.'/'.$file_name;
                
            }
            else
            {
                $myActualPath = "";
                $is_uploaded = '0';
                $file_type = "";
            }
            // print_r($myActualPath);
            // echo "<br/>";
            // print_r($data['law_firm']);
            // echo "<br/>";
            // print_r($data['law_firm_address']);
            
           $arr = [
               'name' => $data['name'],
               'lname' => $data['lname'],
               'email' => $data['email'],
               'degree' => $data['degree'],
               'phn_num' => $data['phn_num'],
               'law_firm' => $data['law_firm'],
               'law_firm_address' => $data['law_firm_address'],
               'city' => $data['city'],
               'zipcode' => $data['zipcode'],
               'country' => $data['country'],
               'file_upload' => $myActualPath,
               'is_lawyer' => $data['is_lawyer']
           ]; 

          
        }
        return User::create($arr);
    }
}
