@extends('backend.layout.master')

@section('content')
<div class="container">
    <h1 class="my-4">Layanan</h1>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services  as $item)
                        <tr>
                            <td>{{$item->id}} </td> <!-- Menampilkan ID blog -->
                            <td>{{$item->title}} </td> <!-- Menampilkan judul blog -->
                            <td>{{$item->description}} </td> <!-- Menampilkan deskripsi blog -->
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
