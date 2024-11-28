@extends('backend.layout.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Edit Slider</h2>
            @if ($errors)
                @foreach ($errors->all() as $item)
                    <p class="text-danger">{{ $item }}</p>
                @endforeach
            @endif

            <form class="user" action="{{ route('backend.sliders.aksi_edit', $slider->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control form-control-user" aria-describedby="emailHelp"
                        placeholder="Masukan judul" value="{{ $slider->title }}">
                </div>
                <div class="form-group">
<<<<<<< HEAD
                    <textarea name="description" class="form-control editor" placeholder="masukan deskripsi"  cols="30" rows="3">{{$slider->description}}</textarea>
=======
                    <textarea name="description" class="form-control editor" placeholder="Masukan deskripsi" cols="30" rows="3">{{ $slider->description }}</textarea>
>>>>>>> 48f0f4079aa57f14eb0b38095f24bf5acbad025e
                </div>
                <div class="form-group">
                    <input type="file" name="file" accept="image/.jpg, .png, .pdf, .docx" class="form-control form-control-user">
                    @if ($slider->file)
                        <p>Current file: {{ $slider->file }}</p>
                    @endif
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-user">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection