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
    public function tambah()
    {
        return view('backend.sliders.TambahSlider'); // Menampilkan form tambah slider
    }

    // Fungsi untuk menyimpan slider baru
    public function aksi_tambah(Request $request)
    {
        // Validasi input form
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar slider
        if ($request->hasFile('file')) {
            // Generate unique filename and save file in 'public/sliders/' directory
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->move(public_path('sliders'), $fileName);
        }

        // Simpan data slider ke database
        Sliders::insert([
            'title' => $request->title,
            'description' => $request->description,
            'file' => 'sliders/' . $fileName,  // Simpan path gambar
        ]);

        return redirect()->route('backend.sliders.index')->with('success', 'Slider berhasil ditambahkan!');
    }

    public function hapus($id)
    {
        // Cari slider berdasarkan ID
        $slider = Sliders::findOrFail($id);

        // Hapus file gambar dari direktori public/sliders/
        if (file_exists(public_path($slider->file))) {
            unlink(public_path($slider->file)); // Menghapus file fisik dari folder
        }

        // Hapus data slider dari database
        $slider->delete();

        // Redirect ke halaman sliders.index dengan pesan sukses
        return redirect()->route('backend.sliders.index')->with('success', 'Slider berhasil dihapus!');
    }

    public function edit($id)
    {
        $slider = Sliders::findOrFail($id); // Mengambil data slider berdasarkan ID
        return view('backend.sliders.edit', compact('slider')); // Mengirim data slider ke view
    }

    public function aksi_edit(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'file|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Mengambil data slider yang akan di-update
        $slider = Sliders::findOrFail($id); // Mengambil slider berdasarkan ID

        // Data yang akan diupdate
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Hapus file gambar lama jika ada
            if ($this->fileExists($slider->file)) { // Menggunakan method untuk cek keberadaan file
                $this->deleteFile($slider->file);  // Menggunakan method untuk menghapus file
            }

            // Pindahkan file baru ke folder public/sliders
            $this->saveFile($file, $filename); // Menyimpan file menggunakan method saveFile
            $data['file'] = 'sliders/' . $filename;  // Perbarui path gambar pada array $data
        }

        // Update data slider di database tanpa menambah entri baru
        $slider->update($data);  // Metode ini hanya memperbarui record yang ada di database

        return redirect()->route('backend.sliders.index')->with('success', 'Slider berhasil diperbarui.'); // Redirect setelah update
    }

    // Method untuk mengecek apakah file ada di folder public/sliders
    protected function fileExists($filePath)
    {
        return $filePath && file_exists(public_path($filePath)); // Mengecek keberadaan file
    }

    // Method untuk menghapus file dari folder public/sliders
    protected function deleteFile($filePath)
    {
        if ($this->fileExists($filePath)) {
            unlink(public_path($filePath)); // Menghapus file
        }
    }

    // Method untuk menyimpan file baru ke folder public/sliders
    protected function saveFile($file, $filename)
    {
        $file->move(public_path('sliders'), $filename); // Memindahkan file
    }
}
