<?php

namespace Kostaria\Http\Controllers;

use Illuminate\Http\Request;
use Kostaria\Models\Regency;
use Kostaria\Models\Province;
use Kostaria\Models\BoardingHouse;
use Kostaria\Models\Owner;

class BoardingHouseController extends Controller
{
    public function __construct()
    {
        // $this->middleware('web', ['only' => 'index']);
        $this->middleware('auth:kostariateam,admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBoardingHouse = BoardingHouse::all();
        return view('boardinghouses.index', compact('listBoardingHouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creates($id)
    {        
        $listRegency = Regency::all();   
        $owner = Owner::find($id);
        return view('boardinghouses.create', compact('listRegency', 'owner'));
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
            'description' => 'required',
            'address' => 'required|max:255',            
            'regency_id' => 'required|numeric',
            'owner_id' => 'required|numeric',
            'facility' => 'required',
            'facility_park' => 'required',
            'access' => 'required',
            'information_others' => 'required',
            'information_cost' => 'required'            
        ));
        $boardinghouse = new boardinghouse;        
        $boardinghouse->name = $request->get('name');
        $boardinghouse->description = $request->get('description');
        $boardinghouse->address = $request->get('address');        
        $boardinghouse->regency_id = $request->get('regency_id');        
        $boardinghouse->owner_id = $request->get('owner_id');        
        $boardinghouse->facility = $request->get('facility');        
        $boardinghouse->facility_park = $request->get('facility_park');        
        $boardinghouse->access = $request->get('access');        
        $boardinghouse->information_others = $request->get('information_others');
        $boardinghouse->information_cost = $request->get('information_cost');        
        $boardinghouse->save();
        return redirect()->route('boardinghouses.index')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boardinghouse = BoardingHouse::find($id);
        return view('boardinghouses.show', compact('boardinghouse'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boardinghouse = BoardingHouse::find($id);
        $listRegency = Regency::all();
        return view('boardinghouses.edit', compact('boardinghouse', 'id','listRegency'));
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
            'description' => 'required',
            'address' => 'required|max:255',            
            'regency_id' => 'required|numeric',
            'owner_id' => 'required|numeric',
            'facility' => 'required',
            'facility_park' => 'required',
            'access' => 'required',
            'information_others' => 'required',
            'information_cost' => 'required'            
        ));
        $boardinghouse = BoardingHouse::find($id);        
        $boardinghouse->name = $request->get('name');
        $boardinghouse->description = $request->get('description');
        $boardinghouse->address = $request->get('address');        
        $boardinghouse->regency_id = $request->get('regency_id');                
        $boardinghouse->facility = $request->get('facility');        
        $boardinghouse->facility_park = $request->get('facility_park');        
        $boardinghouse->access = $request->get('access');        
        $boardinghouse->information_others = $request->get('information_others');
        $boardinghouse->information_cost = $request->get('information_cost');        
        $boardinghouse->save();
        return redirect()->route('boardinghouses.index')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boardinghouse = Boardinghouse::findOrFail($id);
        $boardinghouse->delete();
        return redirect()->route('boardinghouses.index')->with('success', 'berhasil dihapus');
    }

    // public function search(Request $request){
    //     $search = $request->term;
    //     $provinces = Province::whereHas('regencies', function($query){
    //         $query->where('name', 'LIKE', '%'.$search.'%');
    //     })->get();
        
    //     $regencies = Regency::where('name', 'LIKE', '%'.$search.'%')->get();
    //     $data = [];

    //     foreach ($provinces as $province => $value) {
    //         $data[] = ['id'=>$value->id, 'name'=>$value->name];
    //     }

    //     foreach ($regencies as $regency => $value) {
    //         $data[] = ['regency_id'=>$value->id, 'regency_name'=>$value->name];
    //     }

    //     return response($data);
    // }
}
