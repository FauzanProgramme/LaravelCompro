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
                        @foreach ($sliders as $item)
                        <tr>

                            <td>{{ $item->id}} </td> <!-- Menampilkan id blog -->
                            <td>{{ $item->title}} </td> <!-- Menampilkan judul blog -->
                            <td>{{$item->description}} </td> <!-- Menampilkan gambar slider -->
                            <td>
                                <img src="{{ asset($item->file) }}" alt="Gambar Blog" style="width: 100px; height: auto;">
                            </td>


                            <td>
                                <a href="" class="btn btn-warning">Edit</a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection