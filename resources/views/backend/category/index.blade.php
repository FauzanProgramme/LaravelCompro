@extends('backend.layout.master')

@section('content')
<div class="container">
    <h1 class="my-4">Kategori</h1>
    <a href="{{route('backend.category.tambah')}}" class="btn btn-primary mb-2">Tambah Kategori</a>
    <a href="{{route('backend.product.restoreProduct')}}" class="btn btn-danger mb-2  "> Restore Data</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach($category as $item)
                        <tr>
                            <td>{{$no++}} </td> <!-- Menampilkan ID produk -->
                            <td>{{$item->title}} </td> <!-- Menampilkan judul produk -->
                            <td>
                                <a href=" " class="btn btn-warning">Edit</a>
                                <form action=" " method="POST" class="d-inline">
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