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
    public function create($id)
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
            'university_id' => 'required|numeric',
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
        $boardinghouse->university_id = $request->get('university_id');
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
    public function show($university, $id)
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
            'university_id' => 'required|numeric',
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
        $boardinghouse->university_id = $request->get('university_id');
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
        $searchBH = (new Boardinghouse)->newQuery();        

        if ($request->university) {            
            $searchBH->where('university_id', $request->university);
        }
        if ($request->regency) {            
            $searchBH->whereHas('village', function ($query) use ($request){
                $query->whereHas('district', function ($query) use ($request){
                    $query->whereHas('regency', function ($query) use ($request){
                        $query->where('id', $request->regency);
                    });
                });
            });
        }        

        if ($request->minPrice && $request->maxPrice) {
            $searchBH->whereHas('chamber', function ($query) use ($request){
                $query->whereBetween('price_annual', [$request->minPrice, $request->maxPrice]);
            });
        }else{
            if ($request->minPrice) {
                $searchBH->whereHas('chamber', function ($query) use ($request){
                    $query->where('price_annual', '>', $request->minPrice);
                });
            }
            if ($request->maxPrice) {
                $searchBH->whereHas('chamber', function ($query) use ($request){
                    $query->where('price_annual', '<', $request->maxPrice);
                });
            }
        }
        
        for ($i=1; $i <=11 ; $i++) {            
            if($request->has('facility_'.$i)){                
                $searchBH->where(\DB::raw('substr(facility, '.$i.',1)'), '1');
            }            
        }        

        for ($i=1; $i <=7 ; $i++) {            
            if($request->has('chamber_facility_'.$i)){                
                $searchBH->whereHas('chamber', function ($query) use ($i){
                    $query->where(\DB::raw('substr(chamber_facility, '.$i.',1)'), '1');
                });
            }            
        }        

        if ($request->gender) {
            $searchBH->whereHas('chamber', function ($query) use ($request){
                $query->where('gender', $request->gender);
            });
        }


        $listBoardingHouse = $searchBH->get();
        return view('welcome', compact('listBoardingHouse'));
    }

    public function export(){        
        return Excel::download(new BoardinghouseExport, 'boardinghouses_'.Carbon::now().'.xlsx');
    }

}
