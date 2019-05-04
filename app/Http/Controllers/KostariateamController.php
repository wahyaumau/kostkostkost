<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Province;
use App\Models\BoardingHouse;
use App\Models\Transaction;
use App\Models\Kostariateam;
use App\Models\University;
use Illuminate\Support\Facades\Auth;
use Storage;
use Excel;
use App\Exports\KostariateamExport;
use Carbon\Carbon;

class KostariateamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:kostariateam');        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('kostariateam');
    }

    public function show(Kostariateam $kostariateam)
    {        
        return view('kostariateams.show', compact('kostariateam'));
    }

    public function showCredentialForm($edittype){
        
        return view('kostariateams.credentialform', compact('edittype'));
    }

    public function verifyCredential(Request $request, $edittype){
        $this->validate($request, array(            
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ));        
                
        if ((Hash::check($request->password, Auth::guard('kostariateam')->user()->password)) && $request->email == Auth::guard('kostariateam')->user()->email) {
            switch ($edittype) {
                case 'editUserInfo':                                        
                    return redirect()->route('kostariateams.edit', Auth::guard('kostariateam')->user());
                    break;
                case 'editCredential':                    
                    return redirect()->route('kostariateams.editCredential', Auth::guard('kostariateam')->user());
                    break;                
                default:                    
                    break;
            }            
        }else{            
            return redirect()->route('kostariateams.show', Auth::guard('kostariateam')->user())->with('fail', 'password salah');
        }

    }

    public function edit(Kostariateam $kostariateam)
    {                
        $listRegency = Regency::all();        
        return view('kostariateams.edit', compact('kostariateam', 'listRegency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kostariateam $kostariateam)
    {        
        $this->validate($request, array(
            'name' => ['required', 'string', 'max:255'],            
            'regency_id_birth' => ['required'],
            'birth_date' => ['required'],
            'address' => ['required', 'string'],
            'village_id' => ['required'],
            'phone' => ['required'],            
            'nik' => ['required'],
            'photo' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg',
        ));        
        $kostariateam->name = $request->get('name');    
        $kostariateam->regency_id_birth = $request->get('regency_id_birth');
        $kostariateam->birth_date = $request->get('birth_date');
        $kostariateam->address = $request->get('address');                
        $kostariateam->village_id = $request->get('village_id');
        $kostariateam->phone = $request->get('phone');
        $kostariateam->nik = $request->get('nik');        
        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $filename = time().'_'.'team_'.$request->name.'_'.$photo->getClientOriginalName();
            $folderName = 'images/profile';
            Storage::putFileAs($folderName, $photo, $filename);            
            $oldFile = $kostariateam->photo;
            Storage::disk('public-html-profile')->delete($oldFile);            
            $kostariateam->photo = $filename;            
        }        
        $kostariateam->save();
        return redirect()->route('kostariateams.show', $kostariateam)->with('success', 'berhasil diedit');
    }    

    public function editCredential(Kostariateam $kostariateam){
        return view('kostariateams.editCredential', compact('kostariateam'));
    }

    public function updateCredential(Request $request, Kostariateam $kostariateam){        
        $this->validate($request, array(            
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ));  
        if (Hash::check($request->currentPassword, Auth::guard('kostariateam')->user()->password)){
            $kostariateam->email = $request->email;
            $kostariateam->password = bcrypt($request->password);
            $kostariateam->save();
            return redirect()->route('kostariateams.show', $kostariateam)->with('success', 'berhasil diedit');
        }else{
            return back()->with('fail', 'wrong password');
        }

        
    }

    public function export(){
        return Excel::download(new KostariateamExport, 'kostariateams_'.Carbon::now().'.xlsx');
    }
}
