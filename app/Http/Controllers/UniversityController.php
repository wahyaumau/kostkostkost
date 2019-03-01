<?php

namespace Kostaria\Http\Controllers;

use Illuminate\Http\Request;
use Kostaria\Models\Regency;
use Kostaria\Models\Province;
use Kostaria\Models\University;

class UniversityController extends Controller
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
        $listUniversity = University::all();
        return view('universities.index', compact('listUniversity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listRegency = Regency::all();
        return view('universities.create', compact('listRegency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request, array(
            'name' => 'required|max:255',            
            'address' => 'required|max:255|alpha numeric',                        
            'regency_id' => 'required|numeric',            
        ));
        $university = new University;        
        $university->name = $request->get('name');
        $university->address = $request->get('address');        
        $university->regency_id = $request->get('regency_id');        
        $university->save();
        return redirect()->route('universities.index')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $university = University::find($id);
        return view('universities.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::find($id);
        $listRegency = Regency::all();
        return view('universities.edit', compact('university', 'id', 'listRegency'));
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
        $this->validate($request, array(
            'name' => 'required|max:255',            
            'address' => 'required|max:255|alpha numeric',                        
            'regency_id' => 'required|numeric',            
        ));
        $university = University::find($id);
        $university->name = $request->get('name');
        $university->address = $request->get('address');        
        $university->regency_id = $request->get('regency_id');        
        $university->save();
        return redirect()->route('universities.index')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();
        return redirect()->route('universities.index')->with('success', 'berhasil dihapus');
    }



}
