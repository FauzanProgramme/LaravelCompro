@extends('backend.layout.master')

@section('content')
<div class="container">
    <h1>Edit Layanan</h1>
    <form action="{{ route('backend.services.aksi_edit', $service->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Judul:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi:</label>
        <textarea class="form-control" id="description" name="description">{{ $service->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

</div>
@endsection
