<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use Excel;
use App\Exports\RegencyExport;
use Carbon\Carbon;

class RegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProvince = Province::all();
        return view('address.regencycreate', compact('listProvince'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'province_id' => 'required',
        ));
        $regency = new Regency;        
        $regency->name = $request->get('name');        
        $regency->province_id = $request->get('province_id');        
        $regency->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRegencies(Request $request)
    {
        if($request->has('q')){
            $search = $request->q;
            $data = Regency::where('name', 'LIKE', '%'.$search.'%')->get();
        }
        return response()->json($data);
    }

    public function export(){
        return Excel::download(new RegencyExport, 'regencies_'.Carbon::now().'.xlsx');
    }
}
