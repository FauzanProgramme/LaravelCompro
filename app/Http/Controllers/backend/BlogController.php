<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   Public function index(){
    $blog = Blogs::get();
    return view('backend.blog.index', [
        'blogs' => $blog
    ]);
   }
}
