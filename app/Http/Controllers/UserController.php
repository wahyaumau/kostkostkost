<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Province;
use App\Models\BoardingHouse;
use App\Models\Transaction;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser = User::all();
        return view('user.index', compact('listuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new user;        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');        
        $user->regency_id = $request->get('regency_id');        
        $user->password = bcrypt($request->get('password'));
        $user->address = $request->get('address');
        $user->regency_id = $request->get('regency_id');
        $user->phone = $request->get('phone');        
        $user->lineId = $request->get('lineId');        
        $user->parent = $request->get('parent');        
        $user->parent_phone = $request->get('parent_phone');        
        $user->save();
        return redirect()->route('user.index')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $listRegency = Regency::all();
        return view('user.edit', compact('user', 'id','listRegency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');        
        $user->regency_id = $request->get('regency_id');        
        $user->password = bcrypt($request->get('password'));
        $user->address = $request->get('address');
        $user->regency_id = $request->get('regency_id');
        $user->phone = $request->get('phone');        
        $user->lineId = $request->get('lineId');        
        $user->parent = $request->get('parent');        
        $user->parent_phone = $request->get('parent_phone');        
        $user->save();
        return redirect()->route('user.index')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'berhasil dihapus');
    }
}
