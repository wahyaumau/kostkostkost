<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kostariateam;
use App\Models\User;
use App\Models\Chamber;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        return view('admin');
    }

    public function showTransaction()
    {
        $listUser = User::whereHas('chambersTransaction')->get();
        return view('admin.index', compact('listUser'));
    }

    public function showKostariateam(){
        $listKostariaTeam = Kostariateam::all();
        return view('kostariateams.index', compact('listKostariaTeam'));

    }
}
