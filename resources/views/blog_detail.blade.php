@extends('layouts.master')
@section('content')
<div id="content">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-4">
                    <img src="{{ asset($blog->file) }}" class="img-fluid rounded" alt="Blog Post Image">
                    <h2 class="mt-2">{{ $blog->title }}</h2>
                    <p>{{ $blog->description }}</p>
                    <p>Waktu: <strong>{{ $blog->created_at ? $blog->created_at->format('d F Y') : 'Tanggal tidak tersedia' }}</strong></p>
                </div>
            </div>
            <div class="col-lg-4">
                <h3><strong>Recent Posts</strong></h3>
                <div class="recent-posts">
                    @foreach ($blogterbaru as $item)
                    <div class="d-flex mb-3">
                        <img src="{{ asset($item->file) }}" class="me-3 img-thumbnail" alt="Recent Post Image" style="width: 100px; height: auto;">
                        <div>
                            <h6><a href="{{ route('blog.detail', $item->id) }}" class="text-decoration-none">{{ $item->title }}</a></h6>
                            <p>Waktu: <strong>{{ $item->created_at ? $item->created_at->format('d F Y') : 'Tanggal tidak tersedia' }}</strong></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-light text-center py-4 mt-4">
        <p>&copy; 2024 MyBlog. All rights reserved.</p>
    </footer>
</div>
@endsection
