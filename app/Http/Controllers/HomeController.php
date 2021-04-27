<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Video;

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
    public function index(){

        $categories = Category::all();
        $featureds = Video::where('featured', 1) -> get();
        $videos = Video::where('featured', 0) ->get();

        return view('home', compact('categories', 'featureds','videos'));
    }

}
