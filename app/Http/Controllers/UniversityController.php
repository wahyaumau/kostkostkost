<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Province;
use App\Models\University;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUniversity = University::all();
        return view('university.index', compact('listUniversity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $university = new University;        
        $university->name = $request->get('name');
        $university->address = $request->get('address');        
        $university->regency_id = $request->get('regency_id');        
        $university->save();
        return redirect()->route('university.index')->with('success', 'berhasil ditambahkan');
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
        return view('university.show', compact('university'));
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
        return view('university.edit', compact('university', 'id', 'listRegency'));
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
        $university = University::find($id);
        $university->name = $request->get('name');
        $university->address = $request->get('address');        
        $university->regency_id = $request->get('regency_id');        
        $university->save();
        return redirect()->route('university.index')->with('success', 'berhasil diedit');
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
        return redirect()->route('university.index')->with('success', 'berhasil dihapus');
    }

    public function search(Request $request){
        $search = $request->term;
        $provinces = Province::whereHas('regencies', function($query){
            $query->where('name', 'LIKE', '%'.$search.'%');
        })->get();
        $regencies = Regency::where('name', 'LIKE', '%'.$search.'%')->get();
        $data = [];

        foreach ($provinces as $province => $value) {
            $data[] = ['id'=>$value->id, 'name'=>$value->name];
        }

        foreach ($regencies as $regency => $value) {
            $data[] = ['regency_id'=>$value->id, 'regency_name'=>$value->name];
        }

        return response($data);
    }


}
