<?php

namespace Kostaria\Http\Controllers\Auth;

use Kostaria\Models\User;
use Kostaria\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Kostaria\Models\Regency;
use Kostaria\Models\University;

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

    public function showRegistrationForm(){
        $listRegency = Regency::all();
        $listUniversity = University::all();
        return view('auth.register', compact('listRegency', 'listUniversity'));
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
            'address' => ['required', 'string'],
            'regency_id' => ['required'],
            'phone' => ['required'],
            'lineId' => ['required', 'string'],
            'parent' => ['required', 'string'],
            'parent_phone' => ['required'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'regency_id' => $data['regency_id'],
            'university_id' => $data['university_id'],
            'phone' => $data['phone'],
            'lineId' => $data['lineId'],
            'parent' => $data['parent'],
            'parent_phone' => $data['parent_phone'],
        ]);
    }
}
