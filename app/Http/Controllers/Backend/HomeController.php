<?php

namespace App\Http\Controllers\Backend;

use App\Models\Info;
use App\Http\Controllers\Controller;
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

    
    public function index()
    {
        $infos = Info::orderBy('id', 'DESC')->get();
        return view('backend.home.index', compact('infos'));
    }
}
