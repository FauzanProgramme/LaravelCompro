@extends('backend.layout.master')

@section('content')
<div class="container">
    <h1 class="my-4">Produk</h1>
    <a href="{{route('backend.product.tambah')}}" class="btn btn-primary mb-2"> Tambah Produk</a>
    <a href="{{route('backend.product.restoreProduct')}}" class="btn btn-danger mb-2  "> Restore Data</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <td>{{$item->id}} </td> <!-- Menampilkan ID produk -->
                            <td>{{$item->title}} </td> <!-- Menampilkan judul produk -->
                            <td>{{$item->description}} </td> <!-- Menampilkan deskripsi produk -->
                            <td>{{$item->price}} </td> <!-- Menampilkan harga produk -->
                            <td>{{$item->discount}} </td> <!-- Menampilkan diskon produk -->
                            <td>
                                <img src="{{asset($item->file)}}" width="100" alt="product">
                            </td>
                            <td>
                                <a href="{{route('backend.product.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('backend.product.aksi_hapus',$item->id)}}" method="POST" class="d-inline">
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