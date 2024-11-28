@extends('backend.layout.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <h2>Edit Blog</h2>
        @if ($errors)
        @foreach ($errors->all() as $item)
        <p class="text-danger"> {{ $item }}</p>
        @endforeach
        @endif

        <form class="user" action="{{ route('backend.blog.aksi_edit', $blog->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control form-control-user" aria-describedby="emailHelp"
                    placeholder="Masukan judul" value="{{$blog->title}}">
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control editor" placeholder="masukan deskripsi" cols="30" rows="3">{{$blog->description}}</textarea>
            </div>
            <div class="form-group">
                <input type="file" name="file" accept="image/.jpg, .png, .pdf, .docx" class="form-control form-control-user" placeholder="Masukan file" >
                @if ($blog->file)
                <p>Current file: {{ $blog->file }}</p>
                @endif
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