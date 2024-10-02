<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Services;
use App\Models\Blogs;


class HomeController extends Controller
{
    public function index(){
        $services=Services::get();
        $blogs=Blogs::get();
        $sliders=Sliders::get();
        return view('home',[
            'sliders'=>$sliders,
            'services'=>$services,
            'blogs'=>$blogs

        ]);

    }
   
}