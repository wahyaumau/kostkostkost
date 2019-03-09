<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardingHouse;
use App\Models\Chamber;


class ChamberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kostariateam,admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listChamber = Chamber::all();
        return view('chambers.index', compact('listChamber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creates($id)
    {
        $boardinghouse = Boardinghouse::find($id);
        return view('chambers.create', compact('boardinghouse'));
    }

    public function create()
    {
        $listBoardingHouse = BoardingHouse::all();
        return view('chambers.create', compact('listBoardingHouse'));
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
            'boardinghouse_id' => 'required|numeric',
            'price_monthly' => 'required|numeric',
            'price_annual' => 'required|numeric',
            'gender' => 'required|boolean',
            'chamber_size' => 'required',
            'chamber_facility_others' => 'required'            
        ));
        $chamber = new Chamber;        
        $chamber->name = $request->get('name');        
        $chamber->boardinghouse_id = $request->get('boardinghouse_id');        
        $chamber->price_monthly = $request->get('price_monthly');
        $chamber->price_annual = $request->get('price_annual');
        $chamber->gender = $request->get('gender');        
        $chamber->chamber_size = $request->get('chamber_size');
        $facilities=null;
        for ($i=1; $i <=7 ; $i++) { 
            $facility = 0;
            if($request->has('facility_'.$i)){                
                $facility = 1;
            }
            $facilities .= $facility;
        }                
        $chamber->chamber_facility = $facilities;        
        $chamber->chamber_facility_others = $request->get('chamber_facility_others');                
        $chamber->save();
        return redirect()->route('chambers.index')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chamber = Chamber::find($id);
        return view('chambers.show', compact('chamber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chamber = Chamber::find($id);
        $listBoardingHouse = BoardingHouse::all();
        $facilities = str_split($chamber->chamber_facility);
        return view('chambers.edit', compact('chamber', 'id', 'listBoardingHouse', 'facilities'));
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
            'boardinghouse_id' => 'required|numeric',
            'price_monthly' => 'required|numeric',
            'price_annual' => 'required|numeric',
            'gender' => 'required|boolean',
            'chamber_size' => 'required',
            'chamber_facility_others' => 'required'            
        ));
        $chamber = Chamber::find($id);        
        $chamber->name = $request->get('name');        
        $chamber->boardinghouse_id = $request->get('boardinghouse_id');        
        $chamber->price_monthly = $request->get('price_monthly');
        $chamber->price_annual = $request->get('price_annual');
        $chamber->gender = $request->get('gender');        
        $chamber->chamber_size = $request->get('chamber_size');
        $facilities=null;
        for ($i=1; $i <=7 ; $i++) { 
            $facility = 0;
            if($request->has('facility_'.$i)){                
                $facility = 1;
            }
            $facilities .= $facility;
        }                
        $chamber->chamber_facility = $facilities;        
        $chamber->chamber_facility_others = $request->get('chamber_facility_others');                
        $chamber->save();        
        return redirect()->route('chambers.index')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chamber = Chamber::findOrFail($id);
        $chamber->delete();
        return redirect()->route('chambers.index')->with('success', 'berhasil dihapus');
    }

    // public function search(Request $request){
    //     $search = $request->term;
    //     $boardinghouses = BoardingHouse::whereHas('chambers', function($query){
    //         $query->where('name', 'LIKE', '%'.$search.'%');
    //     })->get();        

    //     foreach ($boardinghouses as $boardinghouse => $value) {
    //         $data[] = ['id'=>$value->id, 'name'=>$value->name];
    //     }

    //     return response($data);
    // }

    public function search(Request $request){
        $priceMin = $request->get('priceMin-search');
        $priceMax = $request->get('priceMax-search');
        $listChamber = Chamber::whereBetween('price_annual', [$priceMin, $priceMax])->get();                            
        return view('chambers.index', compact('listChamber'));
    }
}
