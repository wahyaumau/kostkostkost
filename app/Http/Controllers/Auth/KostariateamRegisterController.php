<?php

namespace Kostaria\Http\Controllers\Auth;

use Kostaria\Models\Kostariateam;
use Kostaria\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Kostaria\Models\Regency;
use Kostaria\Models\Admin;

class KostariateamRegisterController extends Controller
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
        $this->middleware('auth:admin');
    }

    public function showRegistrationForm(){
        $listRegency = Regency::all();        
        return view('auth.kostariateam-register', compact('listRegency'));
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
            'regency_id_birth' => ['required'],
            'birth_date' => ['required'],
            'address' => ['required', 'string'],
            'regency_id' => ['required'],
            'phone' => ['required'],            
            'nik' => ['required'],            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Kostaria\User
     */
    protected function create(array $data)
    {
        return Kostariateam::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'regency_id_birth' => $data['regency_id_birth'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'regency_id' => $data['regency_id'],            
            'phone' => $data['phone'],    
            'nik' => $data['nik'],    
        ]);
    }
}
