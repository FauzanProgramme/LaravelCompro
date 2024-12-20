<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::get();
        return view('backend.blog.index', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('backend.blog.TambahBlog');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form
        $request->validate([
            'title' => 'required',  // Field title wajib diisi
            'description' => 'required',  // Field description wajib diisi
            'file' => 'required|file|mimes:jpeg,png,jpg|max:2048',  // File gambar wajib diunggah, hanya menerima format jpeg, png, jpg dengan ukuran maksimal 2MB
        ], [
            'title.required' => 'Judul harus diisi!',  // Pesan kustom untuk validasi 'title'
            'description.required' => 'Deskripsi harus diisi!',  // Pesan kustom untuk validasi 'description'
            'file.required' => 'File gambar harus diunggah!',  // Pesan kustom jika file tidak diunggah
            'file.mimes' => 'File harus berformat jpeg, png, atau jpg!',  // Pesan kustom untuk validasi format file
            'file.max' => 'Ukuran file maksimal 2MB!',  // Pesan kustom untuk validasi ukuran file
        ]);


        // Menyusun data yang akan disimpan ke database
        $data = [
            'title' => $request->title,  // Mengambil data 'title' dari input form (judul blog)
            'description' => $request->description,  // Mengambil data 'description' dari input form (deskripsi blog)
            'slug' => Str::slug($request->title),  // Membuat slug dari judul blog, menggunakan helper Str::slug (contoh: "My First Blog" menjadi "my-first-blog")
            'created_by' => 0,  // ID pembuat blog, sementara di-set ke 0 (placeholder) dan bisa diganti dengan ID user yang login
            'created_at' => now(),  // Menyimpan waktu pembuatan blog menggunakan helper now() untuk mendapatkan timestamp saat ini
        ];

        // Cek apakah file gambar diunggah
        if ($request->hasFile('file')) { // Jika ada file yang diunggah
            $file = $request->file('file'); // Ambil file dari request
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama file unik dengan menambahkan timestamp
            $file->move(public_path('blogs'), $filename); // Pindahkan file ke folder public/blogs di server
            $data['file'] = 'blogs/' . $filename; // Menyimpan path file ke dalam array $data untuk dimasukkan ke database
        }

        // Simpan data blog ke database
        Blogs::insert($data); // Memasukkan data blog ke tabel `blogs` di database

        return redirect()->route('backend.blog.index')->with('success', 'Blog berhasil ditambahkan.'); // Redirect ke halaman daftar blog dengan pesan sukses
    }

    // Menghapus blog
    public function destroy($id)
    {
        $blog = Blogs::findOrFail($id); // Cari blog berdasarkan ID, jika tidak ditemukan, akan memunculkan error 404

        // Hapus file gambar yang terkait jika ada
        if ($blog->file && file_exists(public_path($blog->file))) { // Jika file gambar terkait ada dan ditemukan di folder public/blogs
            unlink(public_path($blog->file)); // Hapus file gambar dari server
        }

        // Hapus data blog dari database
        $blog->delete(); // Menghapus entri blog dari tabel `blogs`

        return redirect()->route('backend.blog.index')->with('success', 'Blog berhasil dihapus.'); // Redirect ke halaman daftar blog dengan pesan sukses
    }
    public function edit($id)
    {
        $blog = Blogs::where('id', $id)->first();
        return view('backend.blog.edit', compact('blog'));
    }
    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file' => 'file|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Mengambil data blog yang akan di-update
        $blog = Blogs::findOrFail($id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
        ];

        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Hapus file gambar lama jika ada
            if ($this->fileExists($blog->file)) { // Menggunakan method di dalam $this untuk cek keberadaan file
                $this->deleteFile($blog->file);  // Menggunakan method di dalam $this untuk menghapus file
            }

            // Pindahkan file baru ke folder public/blogs
            $this->saveFile($file, $filename); // Menyimpan file menggunakan method saveFile
            $data['file'] = 'blogs/' . $filename;  // Perbarui path gambar pada array $data
        }

        // Update data blog di database tanpa menambah entri baru
        $blog->update($data);  // Metode ini hanya memperbarui record yang ada di database

        return redirect()->route('backend.blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    // Method untuk mengecek apakah file ada di folder public/blogs
    protected function fileExists($filePath)
    {
        return $filePath && file_exists(public_path($filePath));
    }

    // Method untuk menghapus file dari folder public/blogs
    protected function deleteFile($filePath)
    {
        if ($this->fileExists($filePath)) {
            unlink(public_path($filePath));
        }
    }

    // Method untuk menyimpan file baru ke folder public/blogs
    protected function saveFile($file, $filename)
    {
        $file->move(public_path('blogs'), $filename);
    }
}
