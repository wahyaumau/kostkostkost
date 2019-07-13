<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Province;
use App\Models\University;
use Excel;
use App\Exports\UniversityExport;
use Carbon\Carbon;
use App\Http\Resources\University as UniversityResource;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kostariateam,admin', ['except' => ['getUniversities', 'getUniversitiesByRegency', 'getUniversitiesApi']]);
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
            'address' => 'required|max:255',                        
            'village_id' => 'required|numeric',    
            'slug' => 'required|alpha_dash|max:255|unique:universities,slug',                    
        ));
        $university = new University;        
        $university->name = $request->get('name');
        $university->slug = $request->get('slug');
        $university->address = $request->get('address');        
        $university->village_id = $request->get('village_id');        
        $university->save();
        return redirect()->route('universities.index')->with('success', 'kampus '.$request->name.' berhasil ditambahkan');
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
        $university = University::find($id);
        $this->validate($request, array(
            'name' => 'required|max:255',            
            'address' => 'required|max:255',                        
            'village_id' => 'required|numeric',  
            'slug' => 'alpha_dash|max:255|unique:universities,slug,'.$university->id,                          
        ));        
        $old_name = $university->name;
        $university->name = $request->get('name');
        $university->slug = $request->get('slug');
        $university->address = $request->get('address');        
        $university->village_id = $request->get('village_id');        
        $university->save();
        return redirect()->route('universities.index')->with('success', 'kampus '.$old_name.' berhasil diedit');
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
        $old_name = $university->name;
        $university->delete();
        return redirect()->route('universities.index')->with('success', 'kampus '.$old_name.' berhasil dihapus');
    }

    // public function getUniversities($name) {        
    //     $listUniversity = Univer::where("name",$name)->pluck("name","id");
    //     return json_encode($listUniversity);
    // }

    public function getUniversities(Request $request)
    {
        if($request->has('q')){
            $search = $request->q;
            $data = University::where('name', 'LIKE', '%'.$search.'%')->get();
        }
        return response()->json($data);
    }

    public function getUniversitiesByRegency($regencyId) {        
        $listUniversity = University::whereHas('village', function ($query) use($regencyId){
                $query->whereHas('district', function($query) use($regencyId){
                    $query->whereHas('regency', function($query) use($regencyId){
                        $query->where('id', $regencyId);
                    });
                });
            })->pluck("name","id");
        return json_encode($listUniversity);
    }

    public function export(){
        return Excel::download(new UniversityExport, 'universities_'.Carbon::now().'.xlsx');
    }

    public function getUniversitiesApi(){
        $universities = University::all();
        return UniversityResource::collection($universities);
    }

}
