<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('backend.product.index', compact('products'));
    }
    public function tambah()
    {
        $category = Category::get();
        return view('backend.product.tambah', compact('category'));
    }
    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'file' => 'required|image|max:2048', // Maksimum 2 MB
        ]);
        $data = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            'file' => $request->file

        ];
        if ($request->hasFile('file')) { // Jika ada file yang diunggah
            $file = $request->file('file'); // Ambil file dari request
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama file unik dengan menambahkan timestamp
            $file->move(public_path('Assetsproduct/products'), $filename); // Pindahkan file ke folder public/Assetproduct/products di server
            $data['file'] = 'Assetsproduct/products/' . $filename; // Menyimpan path file ke dalam array $data untuk dimasukkan ke database
        }

        // Simpan data blog ke database
        Product::insert($data); // Memasukkan data blog ke tabel `blogs` di database

        return redirect()->route('backend.product')->with('success', 'Produk berhasil ditambahkan.'); // Redirect ke halaman daftar blog dengan pesan sukses

    }
    public function edit($id)
    {
        $category = Category::get();
        $products = Product::where('id', $id)->first();
        return view('backend.product.edit', compact('category', 'products'));
    }
    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $data = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            // 'file' => $request->file

        ];
        if ($request->hasFile('file')) { // Jika ada file yang diunggah
            $file = $request->file('file'); // Ambil file dari request
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama file unik dengan menambahkan timestamp
            $file->move(public_path('Assetsproduct/products'), $filename); // Pindahkan file ke folder public/Assetproduct/products di server
            $data['file'] = 'Assetsproduct/products/' . $filename; // Menyimpan path file ke dalam array $data untuk dimasukkan ke database
        }
        Product::where('id',$id)->update($data);
        return redirect()->route('backend.product');
    }

    public function aksi_hapus($id){
        Product::where('id', $id)->delete();
        return redirect()->route('backend.product')->with('data berhasil di hapus');
    }
    public function restoreProduct(){
        Product::onlyTrashed()->restore();
        return redirect()->back();
    }
}
