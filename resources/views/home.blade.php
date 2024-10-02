@extends('layouts.master')
@section('content')
<div id="content">
  <!-- sliders -->
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      @foreach ($sliders as $item)
      <div class="carousel-item active">
        <img src="{{ $item->file }}" class="d-block h-sliders w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $item->title }}</h5>
          <p>{{ $item->description }}</p>
        </div>
      </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </button>
  </div>


  <!-- layanan kami -->
  <div class="container mt-4 mb-4">
    <h3 style="text-align:center ; margin-bottom: 20px;"><b>Layanan Kami</b></h3>
    <div class="row">
      @foreach ($services as $item)
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="border-card border-radius p-4">
          <b>{{$item->title}}</b>
          <p>{{$item->description}}</p>
        </div>
      </div>

      @endforeach
    </div>
  </div>


  <!-- artikel -->
  <div class="container mt-4 mb-4">
    <h3 style="text-align:center ; margin-bottom: 20px;"><b>Artikel</b></h3>

    <div class="row">
      @foreach ($blogs as $item)
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="border-card border-radius p-4">

          <img src="{{ $item->file }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5>{{$item->title}}</h5>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endsection