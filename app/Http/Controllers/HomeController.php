<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Services;
use App\Models\Blogs;
use App\Models\Configuration;

class HomeController extends Controller
{
    public function index(){
        $services=Services::get();
        $blogs=Blogs::get();
        $sliders=Sliders::get();
        $config=Configuration::first();
        return view('home',[
            'sliders'=>$sliders,
            'services'=>$services,
            'blogs'=>$blogs,
            'config'=>$config
        ]);

    }
   
}