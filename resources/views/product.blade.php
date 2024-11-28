@php
use App\Models\Configuration;
$config = Configuration::first();
@endphp
@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Case Studies - Style 2</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="assets/images/fav.png" />
    <!--build:css assets/css/styles.min.css-->
    <link rel="stylesheet" href="{{ asset('Assetsproduct/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('Assetsproduct/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assetsproduct/css/bootstrap-drawer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assetsproduct/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Assetsproduct/css/animate-4.1.1.min.css') }}">


    <!--endbuild-->
</head>

<body>
<div id="content">
        <div class="slider-sub">
            <div class="bg-img">
                <img src="{{ asset($config->file_product) }}" alt="banner" />
            </div>
            <div class="container">
                <div class="text-nav">
                    <div class="heading3 text-white">{{$config->title_product}}</div>
                    <div class="sub-heading mt-8 text-white fw-400">
                        {{$config->description_product}}
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="list-nav flex-center gap-8">
                    <a href="{{ route('product') }}">
                        <div class="nav-item text-button-small text-black pt-8 pb-8 pl-20 pr-20 pointer">semua</div>
                    </a>
                @foreach ($category as $item)
                    <a href="{{ route('product') }}?category={{ $item->id }}">
                        <div class="nav-item text-button-small text-black pt-8 pb-8 pl-20 pr-20 pointer">{{ $item->title }}</div>
                    </a>
                @endforeach
            </div>

            <div class="row mt-40 row-gap-40">
                @foreach ($product as $item)
                    <div class="col-12 col-xl-4 col-sm-6 item-filter" data-name="fintech">
                        <div class="item-main">
                            <div class="bg-img bora-16 overflow-hidden">
                                <img class="w-100 h-100 bora-16 display-block" src="{{ $item->file }}" alt="{{ $item->title }}">
                            </div>
                            <div class="infor bg-white bora-8 pt-24">
                                <p>{{ $item->title }}</p>
                                
                                <b class="body2 text-black mt-8">
                                    Rp {{ number_format($item->price - $item->discount) }}
                                    @if($item->discount > 0)
                                        <del>Rp {{ number_format($item->price) }}</del>
                                    @endif
                                </b>

                                <br>
                                <a href="https://api.whatsapp.com/send?phone=62895352074525&text=hallo saya ingin membeli produk {{$item->title}}" class="text-blue">Order WhatsApp</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--build:js assets/js/main.min.js-->
    <script src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.4.1.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/countUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/phosphor-icon.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal-4.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-drawer.min.js') }}"></script>
    <script src="{{ asset('assets/js/drawer.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>

    <!--endbuild-->
</body>

</html>
@endsection