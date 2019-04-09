<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    	$chamber_id = $chamber->id;
        $user_id = Auth::guard('web')->user()->id;
        $user = User::where('id', $user_id)
                ->whereHas('chambersTransaction', function($query) use ($chamber_id) {
                        $query->where('transactions.chamber_id', $chamber_id);
                })->get();                

        if ($user->isEmpty()) {
            $user = Auth::guard('web')->user();
            $user->chambersTransaction()->attach($chamber_id, [
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
        $bookedChambers = $user->chambersTransaction()->wherePivot('chamber_id', $chamber->id)->get();
        return view('boardinghouses.showPaymentMethod', compact('chamber', 'user', 'bookedChambers'));
    }

    public function destroy($userId, $chamberId){
        $user = User::find($userId);
        $user->chambersTag()->detach($chamberId);        
        return back();
    }
}
