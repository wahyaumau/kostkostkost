<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;

class TagController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function store(Chamber $chamber){
    	$taggedChambers = Auth::guard('web')->user()->chambersTransaction()->wherePivot('chamber_id', $chamber->id)->get();

        if ($taggedChambers->isEmpty()) {
            $user = Auth::guard('web')->user();
            $user->chambersTag()->sync($chamber->id, false);            
            return back()->with('success', 'berhasil ditambahkan');
        }else{
            return back()->with('fail', 'sudah melakukan tag');            
        }        
    }

    public function destroy(User $user, Chamber $chamber){        
        $user->chambersTag()->detach($chamber->id);
        return back()->with('success', 'berhasil menghapus tag');
    }
}
