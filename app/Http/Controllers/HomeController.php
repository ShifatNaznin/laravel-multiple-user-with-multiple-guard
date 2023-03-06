<?php

namespace App\Http\Controllers;

use App\Models\FleetAsset;
use App\Models\FleetData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data=FleetData::get();
        // $assetTotal=FleetData::count();

        return view('admin.dashboard.body-content')->with([
            // 'assetTotal'=>$assetTotal,
            // 'data'=>$data,
        ]);
    }
}
