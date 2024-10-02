<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
    // Method to show the blog listing
    public function blog()
    {
        $blogterbaru = Blogs::orderBy('id', 'desc')->limit(2)->get();
        $blogterlama = Blogs::orderBy('id', 'asc')->get(); // Get all blogs sorted by ID ascending

        return view('blog', [
            'blogterbaru' => $blogterbaru,
            'blogterlama' => $blogterlama
        ]);
    }

    // Method to show the details of a specific blog post
    public function detail($id)
    {
        $blog = Blogs::findOrFail($id); // Fetch the blog post by ID
        $blogterbaru = Blogs::orderBy('id', 'desc')->limit(2)->get(); // Ambil blog terbaru

        return view('blog_detail', [
            'blog' => $blog,
            'blogterbaru' => $blogterbaru
        ]);
    }
}
