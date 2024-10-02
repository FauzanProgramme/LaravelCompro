@extends('layouts.master')
@section('content')

<!-- Artikel -->
<div class="container mt-4">
    <div class="row">
        <!-- Kolom 1 dengan col-8 dan border -->
        <div class="col-8 p-4">
            <div class="row">
                @foreach ($blogterbaru as $item)
                <div class="col-5">
                    <img src="{{$item->file}}" class="card-img-top border-radius" alt="...">
                </div>
                <div class="col-7">
                    <div class="card-body">
                        <h3 class="card-title">{{$item->title}}</h3>
                        <h6 class="mb-0">by Otomotif motor | {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</h6>
                        <a href="{{ route('blog.detail', $item->id) }}" class="text-black"><b>Read More</b></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Kolom 2 dengan col-4 dan border -->
        <div class="col-4 p-4 ">
            <h3><b>Blog Terbaru</b></h3>
            <div class="row p-2">
                @foreach ($blogterbaru as $item)
                <div class="col-3 ">
                    <img src="{{$item->file}}" class="border-radius w-100 h-100" alt="...">
                </div>
                <div class="col-9 ">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <h6 class="mb-0">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</h6>
                        <a href="{{ route('blog.detail', $item->id) }}" class="text-black"><b>Read More</b></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h3><b>Blog Lainnya</b></h3>
    <div class="row">
        @foreach ($blogterlama as $item)
        <div class="col-6">
            <div class="row">
                <div class="col-5">
                    <img src="{{$item->file}}" class="card-img-top border-radius" alt="...">
                </div>
                <div class="col-7">
                    <div class="card-body">
                        <h3 class="card-title">{{$item->title}}</h3>
                        <p>Waktu: <strong>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</strong></p>
                        <a href="{{ route('blog.detail', $item->id) }}" class="text-black"><b>Read More</b></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
