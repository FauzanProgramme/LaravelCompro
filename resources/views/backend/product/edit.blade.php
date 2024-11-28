@extends('backend.layout.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Edit Produk</h2>
            @if ($errors)
                @foreach ($errors->all() as $item)
                    <p class="text-danger"> {{ $item }}</p>
                @endforeach
            @endif

            <form class="user" action="{{ route('backend.product.aksi_edit',$products->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" value="{{$products->title}}" class="form-control form-control-user" aria-describedby="emailHelp"
                        placeholder="Masukan judul">
                </div>  
                <div class="form-group">
                    <select name="category_id" class="form-control" id="">
                    <option value="">Pilih Kategori</option>
                    @foreach($category as $item)
                    <option value="{{$item->id}}"
                    @if($item->id == $products->category_id)
                    selected
                    @endif
                    >{{$item->title}} </option>
                    @endforeach
                    </select>

                </div>  
                <div class="form-group">
                    <input type="number" name="price" value="{{$products->price}}" class="form-control form-control-user" aria-describedby="emailHelp"
                        placeholder="Masukan harga">
                </div>  
                <div class="form-group">
                    <input type="number" name="discount" value="{{$products->price}}"  class="form-control form-control-user" aria-describedby="emailHelp"
                        placeholder="Masukan diskon">
                </div>  
                <div class="form-group">
                    <textarea name="description"  class="form-control editor" placeholder="masukan deskripsi" cols="30" rows="3">{{$products->description}} </textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="file" accept="" class="form-control form-control-user" placeholder="Masukan file">
                    <img src="{{asset($products->file)}}" alt="produk" width="100px">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-user ">
                        Edit
                    </button>
                </div>

            </form>
        </div>
    </div>
    @endsection