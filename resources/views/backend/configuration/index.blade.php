
@extends ('backend.layout.master')
@section ('content')
<div class="container">
    <div class="row">
        <div class="card shadow w-100">
            <div class="card-body">
                @foreach($errors->all() as $item)
                <li class="text-danger">{{$item}}</li>
                @endforeach
                <form action="{{route('backend.aksi_edit')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <h5>Konfigurasi</h5>
                    <div class="form-grup">
                        <label>Judul</label>
                        <input type="text" name="title_web" value="{{$config->title_web}}" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">
                        <img src="{{asset($config->logo)}}" alt="logo" width="100">
                    </div>
                    <div class="form-grup">
                        <label>Phone</label>
                        <input type="number" name="phone" value="{{$config->phone}}" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label>Judul Tentang</label>
                        <input type="text" name="title_about" value="{{$config->title_about}}"  class="form-control">
                    </div>
                    <div class="form-grup">
                        <label>File Tentang</label>
                        <input type="file" name="file_about" value="" class="form-control">
                        <img src="{{asset($config->file_about)}}" class="mt-2" alt="logo" width="100">
                    </div>
                    <div class="form-grup">
                        <label>Deksripsi Tentang</label>
                        <textarea name="description_about" class="form-control" cols="30" rows="7">{{$config->description_about}}</textarea>
                    </div>
                    <div class="form-grup">
                        <label>Judul Banner Product</label>
                        <input type="text" name="title_product" value="{{$config->title_product}}"  class="form-control">
                    </div>
                    <div class="form-grup">
                        <label>File Banner Product</label>
                        <input type="file" name="file_product" value="" class="form-control">
                        <img src="{{asset($config->file_product)}}" class="mt-2" alt="file_product">
                    </div>
                    <div class="form-grup">
                        <label>Deksripsi Banner Product</label>
                        <textarea name="description_product"  class="form-control" cols="30" rows="7">{{$config->description_product}}</textarea>
                    </div>
                    <button class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection