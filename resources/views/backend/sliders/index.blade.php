@extends('backend.layout.master')

@section('content')
<div class="container">
    <h1 class="my-4">Sliders</h1>
    <a href="" class="btn btn-primary mb-2">Tambah layanan</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Blog</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td> <!-- Menampilkan ID blog -->
                            <td>Motor Custom</td> <!-- Menampilkan judul blog -->
                            <td>deksripsi singkat</td> <!-- Menampilkan gambar slider -->
                            <td>path</td> <!-- Menampilkan deskripsi blog -->
                            
                            
                            <td>
                                <a href="" class="btn btn-warning">Edit</a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
