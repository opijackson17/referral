<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BusinessController;

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
        return view('dashboard', 
            ['referral' => (new BusinessController)->show(), 'timeseries' => (new BusinessController)->timeSeries()]);
    }
}
