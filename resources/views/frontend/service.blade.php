@extends('frontend.common.template')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">
<style>
  .fs-22{
      font-size: 22px;
  }

  .rounded-10{
      border-radius: 10px;
  }

  .sidebar ul{
      list-style: none;
      padding: 0px;
  }

  .sidebar ul  li{
      border: 1px solid #dfdfdf;
      margin-bottom: -1px;
  }
  .sidebar ul li a{
      padding: 15px;
      display: block;
  }

  .sidebar ul  li:hover a, .sidebar ul  li.active a{
      background-color: #5576C0;
      color: #fff;
  }
  .carousel-item {
      width: 100%;
      margin-left: 0px;
  }
  
  .carousel-control-next, .carousel-control-prev{
      height: 60px;
      background-color: #5576c0;
  }
  .carousel-control-prev {
      left: auto;
      right: 15% !important;
  }

  .service-content p img {
    width: 100% !important;
    border-radius: 8px;
}
h4.fw-bold.mt-0.mt-md-5.mb-4 {
    margin-top: 0.5rem!important;
}
.services .service {
    margin-top: 30px;
}

</style>
<section class="service-banner">
  <div class="mx-row ">
    <p class="banner-title text-white">{{$Service_details->name}}</p>
    <div class="text-white fs-5"> <a href="{{ url('/') }}"> Home </a> <span class="text-purple"> > </span>{{$Service_details->name}}</div>
  </div>
</section>
<section class="services py-5 px-3">
  <div class="mx-row">
      <div class="row p-0">
          <div class="col col-md-4 sidebar d-flex flex-column">
              <div class="order-1 order-md-0  w-100 mb-4 mb-md-0">
                  <h4 class="fw-bold mb-4">All Services</h4>
                  <ul class="service-list">
                    @foreach($services as $key => $service)
                      <li class="{{ request()->is(['services/'.$service->slug]) ? 'active' : '' }}"><a href="{{url('services/'.$service->slug)}}"> {{$service->name}}</a></li>
                    @endforeach
                  </ul>
              </div>
              <div class="rder-0 order-md-1 m-0">
                  <h4 class="fw-bold mt-0 mt-md-5 mb-4">Gallery</h4>
                    <div id="carouselExampleControls" class="carousel slide mw-100 m-0 mb-5" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        @php
                        $i=0;
                        @endphp
                        @foreach ($service_slider as $service_sliders)
                        <div class="carousel-item {{($i==0)? 'active' : '' }}">
                          <img src="{{$service_sliders->image}}" class="d-block img-fluid w-100" alt="...">
                        </div>
                        @php
                        $i++
                        @endphp
                        @endforeach
                      </div>
                      <div class="d-flex ">
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                      </div>
                    </div>
              </div>
          </div>
          <div class="col-md-8 service">
              <div class="service-content">
                  {{-- <img src="uploads/ser.jpg" class="img-fluid w-100 rounded rounded-3"> --}}
                  <p class="text-secondary mt-4">{!!$Service_details->description!!}</p>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection