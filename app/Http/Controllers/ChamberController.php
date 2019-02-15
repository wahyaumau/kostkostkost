<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardingHouse;
use App\Models\Chamber;


class ChamberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listchamber = Chamber::all();
        return view('chamber.index', compact('listchamber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chamber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chamber = new Chamber;        
        $chamber->name = $request->get('name');        
        $chamber->boarding_house_id = $request->get('boarding_house_id');        
        $chamber->price_monthly = $request->get('price_monthly');
        $chamber->price_annual = $request->get('price_annual');
        $chamber->gender = $request->get('gender');        
        $chamber->chamber_size = $request->get('chamber_size');                
        $chamber->chamber_facility = $request->get('chamber_facility');        
        $chamber->save();
        return redirect()->route('chamber.index')->with('success', 'berhasil ditambahkan');
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
        return view('chamber.show', compact('chamber'));
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
        return view('chamber.edit', compact('chamber', 'id', 'listBoardingHouse'));
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
        $chamber = Chamber::find($id);        
        $chamber->name = $request->get('name');        
        $chamber->boarding_house_id = $request->get('boarding_house_id');        
        $chamber->price_monthly = $request->get('price_monthly');
        $chamber->price_annual = $request->get('price_annual');
        $chamber->gender = $request->get('gender');        
        $chamber->chamber_size = $request->get('chamber_size');                
        $chamber->chamber_facility = $request->get('chamber_facility');        
        $chamber->save();
        return redirect()->route('chamber.index')->with('success', 'berhasil diedit');
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
        return redirect()->route('chamber.index')->with('success', 'berhasil dihapus');
    }
}
