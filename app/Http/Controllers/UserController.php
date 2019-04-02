<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Province;
use App\Models\BoardingHouse;
use App\Models\Transaction;
use App\Models\User;
use App\Models\University;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }        

    public function index(){
        return view('home');
    }
    
    public function show(User $user)
    {        
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {        
        $listProvince = Province::all();
        $listUniversity = University::all();
        return view('users.edit', compact('user', 'listProvince', 'listUniversity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {        
        $this->validate($request, array(
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            'address' => ['required', 'string'],
            'village_id' => ['required'],
            'university_id' => ['required'],
            'phone' => ['required'],
            'lineId' => ['required', 'string'],
            'parent' => ['required', 'string'],
            'parent_phone' => ['required'],
        ));        
        $user->name = $request->get('name');
        // $user->email = $request->get('email');
        $user->address = $request->get('address');        
        // $user->password = bcrypt($request->get('password'));        
        $user->village_id = $request->get('village_id');
        $user->university_id = $request->get('university_id');
        $user->phone = $request->get('phone');
        $user->lineId = $request->get('lineId');
        $user->parent = $request->get('parent');
        $user->parent_phone = $request->get('parent_phone');
        $user->save();
        return redirect()->route('users.show', $user)->with('success', 'berhasil diedit');
    }    
    
}
