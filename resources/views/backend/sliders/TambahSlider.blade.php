@extends('backend.layout.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Tambah Slider</h2>
            @if ($errors)
                @foreach ($errors->all() as $item)
                    <p class="text-danger"> {{ $item }}</p>
                @endforeach
            @endif

            <form class="user" action="{{ route('backend.sliders.aksi_tambah') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control form-control-user" aria-describedby="emailHelp"
                        placeholder="Masukan judul">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control editor" placeholder="masukan deskripsi" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="file" accept="image/.jpg, .png, .pdf, .docx" class="form-control form-control-user" placeholder="Masukan file">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-user ">
                        Tambah
                    </button>
                </div>

            </form>
        </div>
    </div>
    @endsection
