<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kostariateam;

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

    public function showKostariateam(){
        $listKostariaTeam = Kostariateam::all();
        return view('kostariateams.index', compact('listKostariaTeam'));

    }
}
