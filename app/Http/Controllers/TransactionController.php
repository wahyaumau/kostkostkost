<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Storage;

class TransactionController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function showTransactionForm(Chamber $chamber){        
        $bookedChambers = Auth::guard('web')->user()->chambersTransaction()->wherePivot('chamber_id', $chamber->id)->get();
        if ($bookedChambers->isEmpty()) {
            return view('boardinghouses.transactionForm', compact('chamber'));    
        }else{            
            return back()->with('gagal', 'sudah melakukan book');

        }
        
    }

    public function store(Chamber $chamber, Request $request){
        $this->validate($request, array(            
            'rent_month_duration' => 'required|numeric',            
            'rent_start' => 'required|date|after:now',            
        ));    	
        $bookedChambers = Auth::guard('web')->user()->chambersTransaction()->wherePivot('chamber_id', $chamber->id)->get();

        if ($bookedChambers->isEmpty()) {
            $user = Auth::guard('web')->user();
            $user->chambersTransaction()->attach($chamber->id, [
                'rent_month_duration' => $request->rent_month_duration,
                'rent_start' => $request->rent_start,
            ]);
            return redirect()->route('transactions.showPaymentMethod', $chamber)->with('success', 'berhasil ditambahkan');
        }else{
            return back()->with('gagal', 'sudah melakukan tag');            
        }        
    }

    public function showPaymentMethod(Chamber $chamber){
        $user = Auth::guard('web')->user();
        $bookedChamber = $user->chambersTransaction()->wherePivot('chamber_id', $chamber->id)->first();
        return view('boardinghouses.showPaymentMethod', compact('user', 'bookedChamber'));
    }

    public function destroy($userId, $chamberId){
        $user = User::find($userId);
        $user->chambersTag()->detach($chamberId);
        return back();
    }

    public function showPaymentProofUploadForm(Chamber $chamber){        
        $user = Auth::guard('web')->user();
        $bookedChamber = $user->chambersTransaction()->where('chamber_id', $chamber->id)->first();
        if ($bookedChamber->pivot->payment_proof == null){
            return view('boardinghouses.paymentProofUploadForm', compact('user', 'bookedChamber'));    
        }else{
            return back()->with('error', 'sudah upload bukti pembayaran');
        }
        
    }

    public function paymentProofStore(Request $request, Chamber $chamber){
        $user = Auth::guard('web')->user();
        $bookedChamber = $user->chambersTransaction()->where('chamber_id', $chamber->id)->first();                
        if ($bookedChamber->pivot->payment_proof == null) {
            if ($request->hasFile('payment_proof')) {
                $this->validate($request, array(            
                    'payment_proof' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg',                
                ));
                $bookedChamber = $user->chambersTransaction()->where('chamber_id', $chamber->id)->first();
                $file = $request->payment_proof;
                $filename = time().'_'.$bookedChamber->pivot->user_id.'-'.$bookedChamber->pivot->chamber_id.'_'.$file->getClientOriginalName();
                $folderName = 'images';
                Storage::putFileAs($folderName, $file, $filename);            
                $bookedChamber->pivot->payment_proof = $filename;            
                $bookedChamber->pivot->save();
            }                            
        }else{
            return back()->with('error', 'sudah upload bukti pembayaran');
        }
    }
}
