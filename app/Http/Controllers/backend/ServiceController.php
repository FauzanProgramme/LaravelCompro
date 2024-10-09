<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {    
        return view('backend.services.index'); // Kirim data ke view
    }
}
