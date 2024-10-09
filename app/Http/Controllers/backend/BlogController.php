<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index()
    {
        return view('backend.blog.index'); // Kirim data ke view
    }
}
