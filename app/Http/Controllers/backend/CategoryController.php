<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('backend.category.index', compact('category'));
    }
    public function tambah()
    {
        return view('backend.category.tambah');
    }
    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $data = [
            'title' => $request->title,
        ];
        Category::insert($data);
        return redirect()->route('backend.category');
    }
}
