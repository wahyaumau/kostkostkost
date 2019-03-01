<?php

namespace Kostaria\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Kostaria\Models\Regency;
use Kostaria\Models\Province;
use Kostaria\Models\BoardingHouse;
use Kostaria\Models\Transaction;
use Kostaria\Models\User;
use Kostaria\Models\University;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser = User::all();
        return view('users.index', compact('listUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listRegency = Regency::all();
        $listUniversity = University::all();
        return view('users.create', compact('listRegency', 'listUniversity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|alpha',
            'email' => 'required|e-mail',
            'password' => 'required|min:6',
        ]);
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');        
        $user->password = Hash::make($request->get('password'));        
        $user->regency_id = $request->get('regency_id');
        $user->university_id = $request->get('university_id');
        $user->phone = $request->get('phone');
        $user->lineId = $request->get('lineId');
        $user->parent = $request->get('parent');
        $user->parent_phone = $request->get('parent_phone');
        $user->save();
        return redirect()->route('users.index')->with('success', 'berhasil diedit');

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
        return view('users.show', compact('user'));
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
        $listUniversity = University::all();
        return view('users.edit', compact('user', 'id', 'listRegency', 'listUniversity'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255|alpha',
            'email' => 'required|e-mail',
            'password' => 'required|min:6',
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');        
        $user->password = bcrypt($request->get('password'));        
        $user->regency_id = $request->get('regency_id');
        $user->university_id = $request->get('university_id');
        $user->phone = $request->get('phone');
        $user->lineId = $request->get('lineId');
        $user->parent = $request->get('parent');
        $user->parent_phone = $request->get('parent_phone');
        $user->save();
        return redirect()->route('users.index')->with('success', 'berhasil diedit');
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
        return redirect()->route('users.index')->with('success', 'berhasil dihapus');
    }
}
