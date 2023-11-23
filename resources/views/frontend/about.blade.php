@extends('frontend.common.template')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">
<style>
  .why-choose-us .about {
    margin-top: 0px;
}
</style>
<section class="service-banner">
  <div class="mx-row ">
    <p class="banner-title text-white">About Us</p>
    <div class="text-white fs-5"> <a href="{{ url('/') }}"> Home </a> <span class="text-purple"> > </span>About Us</div>
  </div>
</section>

<section class="about-section">
    <div class="mx-row">
      <div class="container-fluid">
        <div class="row gx-5">
          <div class="col-lg-6">
            <p class="title">About Us</p>
              <p class="detail pb-3">{!!$about1->page_description!!}</p>
          </div>
          <div class="col-lg-6 text-center text-lg-start">
            <img src="{{asset('uploads/about1.png')}}" class="img-fluid w-100">
          </div>
        </div>
      </div>
    </div>
</section>
<section class="why-choose-us">
    <div class="mx-row">
      <div class="container-fluid about mb-5 pb-5">
        <div class="row gy-4 g-lg-3 g-xl-5">
          <div class="col-md-6 ms-0 text-center">
            <div class="feature-box h-100">
              <img src="{{asset('uploads/pickup.png')}}" class="img-fluid">
              {{-- <p class="f-title">Fast-repair</p> --}}
              <p class="f-info m-0">{!!$about2->page_description!!}</p>
            </div>
          </div>
          <div class="col-md-6 ms-0 text-center">
            <div class="feature-box h-100">
              <img src="{{asset('uploads/warrenty.png')}}" class="img-fluid">
              {{-- <p class="f-title">Expert Tech</p> --}}
              <p class="f-info m-0">{!!$about3->page_description!!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection