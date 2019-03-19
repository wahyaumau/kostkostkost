<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Mou;
use App\Models\Kostariateam;
use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;

class MOUController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth:kostariateam');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if (Auth::guard('kostariateam')->check()) {            
            $kostariateam_id = Auth::guard('kostariateam')->user()->id;
            $listMou = Mou::where('kostariateam_id', $kostariateam_id)->get();
            return view('mou.index', compact('listMou'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listRegency = Regency::all();
        if (Auth::guard('kostariateam')->check()) {
            
        $kostariateam = Auth::guard('kostariateam')->user();
        return view('mou.create', compact('listRegency', 'kostariateam'));
        }
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
            'regency_id_birth' => 'required|numeric',
            'regency_id_owner' => 'required|numeric',
            'phone' => 'required|numeric',
            'nik' => 'required|numeric',
            'birth_date' => 'required|date|before:now',            
        ));
        $owner = new Owner;
        $owner->name = $request->get('name');
        $owner->address = $request->get('address');
        $owner->regency_id_birth = $request->get('regency_id_birth');
        $owner->regency_id = $request->get('regency_id_owner');
        $owner->phone = $request->get('phone');
        $owner->nik = $request->get('nik');
        $owner->birth_date = $request->get('birth_date');
        $owner->save();

        $ownernik = $request->get('nik');
        $owner = Owner::where('nik', $ownernik)->first();
        $this->validate($request, array(
            // 'owner_id' => 'required|numeric',
            'regency_id' => 'required|numeric',
            'signed_at' => 'required|date',
            'ended_at' => 'required|date|after:signed_at',
        ));
        $mou = new MOU;        
        $kostariateam_id = Auth::guard('kostariateam')->user()->id;
        $mou->kostariateam_id = $kostariateam_id;
        $mou->owner_id = $owner->id;
        $mou->regency_id = $request->get('regency_id');        
        $mou->signed_at = $request->get('signed_at');        
        $mou->ended_at = $request->get('ended_at');        
        $mou->save();        
        return redirect()->route('mou.index');
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
}
