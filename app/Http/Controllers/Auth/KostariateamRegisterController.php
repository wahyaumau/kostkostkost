<?php

namespace App\Http\Controllers\Auth;

use App\Models\Kostariateam;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = 'admin';

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
            'village_id' => ['required'],
            'phone' => ['required'],            
            'nik' => ['required'],            
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
        return Kostariateam::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'regency_id_birth' => $data['regency_id_birth'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'village_id' => $data['village_id'],            
            'phone' => $data['phone'],    
            'nik' => $data['nik'],    
        ]);
    }

    public function register(Request $request)
    {
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->create($request->all())));

    // $this->guard()->login($user);

    return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
    }
}
