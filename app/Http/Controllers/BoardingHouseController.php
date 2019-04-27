<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Boardinghouse;
use App\Models\Owner;
use App\Models\University;
use Storage;
use Excel;
use Carbon\Carbon;
use App\Exports\BoardinghouseExport;

class BoardinghouseController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth:kostariateam,admin', ['except' => ['search', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBoardingHouse = Boardinghouse::paginate(20);
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
            'facility_other' => 'required',
            'access' => 'required',
            'information_others' => 'required',
            'information_cost' => 'required'
        ));
        $boardinghouse = new Boardinghouse;
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
        if ($request->hasFile('video')) {
            $file = $request->video;
            $filename = time().'_'.$request->name.'_'.$file->getClientOriginalName();
            $folderName = 'videos';
            Storage::putFileAs($folderName, $file, $filename);            
            $boardinghouse->video = $filename;            
        }        
        $boardinghouse->save();
        return redirect()->route('boardinghouses.index')->with('success', 'kostan '.$request->name.' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boardinghouse = Boardinghouse::find($id);
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
        $boardinghouse = Boardinghouse::find($id);
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
        $boardinghouse = Boardinghouse::find($id);
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
        if ($request->hasFile('video')) {
            $file = $request->video;
            $filename = time().'_'.$request->name.'_'.$file->getClientOriginalName();
            $folderName = 'videos';
            Storage::putFileAs($folderName, $file, $filename);            
            $oldFile = $boardinghouse->video;
            Storage::disk('public-html-videos')->delete($oldFile);            
            $boardinghouse->video = $filename;            
        }        
        $boardinghouse->save();
        return redirect()->route('boardinghouses.index')->with('success', 'kostan berhasil diedit');
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
        Storage::disk('public-html-videos')->delete($boardinghouse->video);            
        $boardinghouse->delete();
        return redirect()->route('boardinghouses.index')->with('success', 'kostan berhasil dihapus');
    }

    public function search(Request $request){
        if ($request->university || $request->regency) {
            $university = University::whereId($request->university)->first();
            if ($university) {
                $university_village_id = $university->village_id;
            }else{
                $university_village_id = '';
            }

            $regency = Regency::whereId($request->regency)->first();
            if ($regency) {
                $regency_id = $regency->id;
            }else{
                $regency_id = '';
            }
            
            $listBoardingHouse = Boardinghouse::where('village_id', 'LIKE', '%'.$university_village_id.'%')
            ->whereHas('village', function ($query) use($regency_id){
                $query->whereHas('district', function($query) use($regency_id){
                    $query->whereHas('regency', function($query) use($regency_id){
                        $query->where('id', 'LIKE', '%'.$regency_id.'%');
                    });
                });
            })->get();
            return view('welcome', compact('listBoardingHouse'));
        }else{
            return back();
        }
    }

    public function export(){        
        return Excel::download(new BoardinghouseExport, 'boardinghouses_'.Carbon::now().'.xlsx');
    }

}
