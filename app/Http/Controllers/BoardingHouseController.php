<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\BoardingHouse;
use App\Models\Owner;

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
        $listBoardingHouse = BoardingHouse::paginate(10);
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
            'village_id' => 'required|numeric',
            'owner_id' => 'required|numeric',
            // 'facility' => 'required',
            'facility_other' => 'required',
            'access' => 'required',
            'information_others' => 'required',
            'information_cost' => 'required'            
        ));
        $boardinghouse = new boardinghouse;        
        $boardinghouse->name = $request->get('name');
        $boardinghouse->description = $request->get('description');
        $boardinghouse->address = $request->get('address');        
        $boardinghouse->village_id = $request->get('village_id');        
        $boardinghouse->owner_id = $request->get('owner_id');        
        $facilities=null;
        for ($i=1; $i <=11 ; $i++) { 
            $facility = 0;
            if($request->has('facility_'.$i)){                
                $facility = 1;
            }
            $facilities .= $facility;
        }
        $boardinghouse->facility = $facilities;
        $boardinghouse->facility_other = $request->get('facility_other');        
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
        $facilities = str_split($boardinghouse->facility);
        $listRegency = Regency::all();
        return view('boardinghouses.edit', compact('boardinghouse', 'id','listRegency', 'facilities'));
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
            'village_id' => 'required|numeric',
            // 'owner_id' => 'required|numeric',
            // 'facility' => 'required',
            'facility_other' => 'required',
            'access' => 'required',
            'information_others' => 'required',
            'information_cost' => 'required'            
        ));
        $boardinghouse = BoardingHouse::find($id);        
        $boardinghouse->name = $request->get('name');
        $boardinghouse->description = $request->get('description');
        $boardinghouse->address = $request->get('address');        
        $boardinghouse->village_id = $request->get('village_id');        
        // $boardinghouse->owner_id = $request->get('owner_id');        
        $facilities=null;
        for ($i=1; $i <=11 ; $i++) { 
            $facility = 0;
            if($request->has('facility_'.$i)){                
                $facility = 1;
            }
            $facilities .= $facility;
        }
        $boardinghouse->facility = $facilities;
        $boardinghouse->facility_other = $request->get('facility_other');        
        $boardinghouse->access = $request->get('access');        
        $boardinghouse->information_others = $request->get('information_others');
        $boardinghouse->information_cost = $request->get('information_cost');        
        $boardinghouse->save();
        return redirect()->route('boardinghouses.index')->with('success', 'berhasil diedit');
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

    public function search(Request $request){
        $name = $request->get('name-search');
        $address = $request->get('address-search');
        $listBoardingHouse = Boardinghouse::where('name', 'LIKE', '%'.$name.'%')
                            ->where('address', 'LIKE', '%'.$address.'%');
        
        return view('boardinghouses.index', compact('listBoardingHouse'));
    }

}
