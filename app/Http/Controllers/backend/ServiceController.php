<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Services; // Pastikan nama model sudah benar
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Menampilkan semua layanan
    public function index()
    {
        $services = Services::all(); // Mengambil semua data layanan
        return view('backend.services.index', compact('services')); // Mengirim data ke view
    }

    // Menampilkan form untuk menambahkan layanan baru
    public function create()
    {
        return view('backend.services.TambahService'); // Menampilkan view form
    }

    // Menyimpan layanan baru ke database
    public function store(Request $request)
    {
        // Validasi data yang dikirim oleh pengguna
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Membuat layanan baru
        Services::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('backend.services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Menghapus layanan
    public function aksi_hapus($id)
    {
        $service = Services::findOrFail($id); // Mencari data layanan berdasarkan ID
        $service->delete(); // Menghapus data layanan
        return redirect()->route('backend.services.index')->with('success', 'Layanan berhasil dihapus'); // Redirect dengan pesan sukses
    }

    // Menampilkan form untuk mengedit layanan
    public function edit($id)
    {
        $service = Services::findOrFail($id); // Mengambil data layanan berdasarkan ID
        return view('backend.services.edit', compact('service')); // Mengirim data layanan ke view edit
    }

    // Memperbarui data layanan di database
    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service = Services::findOrFail($id); // Mengambil data service berdasarkan ID
        $service->update([ // Memperbarui data service
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('backend.services.index')->with('success', 'Layanan berhasil diperbarui!');
    }
}
