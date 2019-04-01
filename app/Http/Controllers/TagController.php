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
    	$chamber_id = $chamber->id;
        // $user = User::whereHas('chambersTag')->get();
	    $user = User::whereHas('chambersTag', function($query) use ($chamber_id) {
	        $query->where('chamber_user_tag.id', $chamber_id);
	    })->get();
        if ($user) {
            $user = Auth::guard('web')->user();
            $user->chambersTag()->sync($chamber->id, false); 
            return back()->with('success', 'berhasil ditambahkan');
        }else{            
            return back()->with('gagal', 'sudah melakukan tag');
        }	        
    }
}
