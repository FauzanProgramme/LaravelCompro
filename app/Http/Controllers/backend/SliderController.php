<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sliders;

class SliderController extends Controller
{
    public function index()
    {    
        $slider = Sliders::get();
        return view('backend.sliders.index', [
            'sliders' => $slider
        ]);
       // Kirim data ke view
    }
}