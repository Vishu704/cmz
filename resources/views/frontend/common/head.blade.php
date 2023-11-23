<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <title>{{ $page_title }}</title>

    <!-- bootstrap links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- testimonials slider  CDN -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>

    <!-- testimonials slider  custom css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="http://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css">

    <!-- boootstrap icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- custom css link -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
  <body>
    
    <div class="whatsapp-call-icon">
      <a href="https://api.whatsapp.com/send?phone=91{{$user->phone}}&text=" target="_blank"><i class="bi bi-whatsapp"></i></a>
    </div>
    <div class="phone-call-icon">
      <a href="tel:{{$user->phone}}" target="_blank"><i class="bi bi-telephone-fill"></i></a>
    </div>
    
    <header class="{!! Request::is('/') ? 'position-absolute' : '' !!} w-100">
        <div class="mx-row">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                  <a class="navbar-brand p-0 ms-0" href="{{ url('/') }}"><img src="{{asset('uploads/logo-white.png')}}" class="img-fluid"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end mt-auto" id="navbarNav">
                    <button class="navbar-toggler close" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                      <i class="bi bi-x-circle"></i>
                    </button>

                    <ul class="navbar-nav me-0 pe-2">
                      <li class="nav-item">
                        <a class="nav-link px-3 active" aria-current="page" href="{{ url('/') }}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-3" href="{{url('about-us')}}">About Us</a>
                      </li>

                      {{-- <li class="nav-item">
                        <a class="nav-link px-3  dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Repair</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>  --}}
                      <li class="nav-item">
                        <a class="nav-link px-3  dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Repair</a>
                        <ul class="dropdown-menu dropdown-menu-light p-0 overflow-hidden">
                          @foreach($products as $key => $product)
                          <li><a class="dropdown-item py-3 border-bottom" href="{{url('product-list/'.$product->cat_slug)}}">{{($product->cat_name)}}</a></li>
                          @endforeach
                          <li><a class="dropdown-item py-3 border-bottom" href="{{url('mobile')}}">Other Mobile</a></li>
                          <li><a class="dropdown-item py-3 border-bottom" href="{{url('laptop')}}">Other Laptop</a></li>
                        </ul>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link px-3  dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sell Products</a>
                        <ul class="dropdown-menu dropdown-menu-light p-0 overflow-hidden">
                          @foreach($sellprodcat as $key => $sellprodcats)
                          <li><a class="dropdown-item py-3 border-bottom" href="{{url('sell-product-list/'.$sellprodcats->cat_slug)}}">{{$sellprodcats->cat_name}}</a></li>
                          @endforeach
                        </ul>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link px-3" href="{{ url('services')}}">Services</a>
                        {{-- <ul class="dropdown-menu dropdown-menu-light p-0 overflow-hidden">
                          @foreach($serv as $key => $serve)
                          <li><a class="dropdown-item py-3 border-bottom" href="{{url('services/'.$serve->slug)}}">{{$serve->name}}</a></li>
                          @endforeach
                        </ul> --}}
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-3" href="{{ url('contact-us')}}">Contact Us</a>
                      </li>
                    </ul>
                  </div>
                    <div class="phone-no m-0 position-absolute">
                      <a href="https://www.google.com/maps/dir//Booth+No+3+Phase+7,+Near+Chawla+Nursing+Home+Lights,+opposite+State+Bank+of+India,+Sector+61,+Sahibzada+Ajit+Singh+Nagar,+Punjab+160061/@30.7067788,76.6546815,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x390fee85b4197c03:0x956f78ae7deb5a95!2m2!1d76.7247217!2d30.7067976" style="background:none;" target="_blank"> Direction </a>
                      <a href="tel:{{$user->phone}}"><span class="d-none d-md-inline-block">Call Now :</span> {{$user->phone}} </a>
                      {{-- <a href="tel:{{$user->phone}}">--}}
                          {{-- Call Now : {{$user->phone}}
                           <span class="waviy">
                            <span style="--i:1">9</span>
                            <span style="--i:2">9</span>
                            <span style="--i:3">9</span>
                            <span style="--i:4">9</span>
                            <span style="--i:5">9</span>
                            <span style="--i:6">0</span>
                            <span style="--i:7">0</span>
                            <span style="--i:8">0</span>
                            <span style="--i:9">0</span>
                            <span style="--i:10">0</span>
                          </span> --}}
                      {{-- </a> --}}
                    </div>
                </div>
            </nav>
        </div>
    </header>