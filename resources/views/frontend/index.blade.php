@extends('frontend.common.template')

@section('content')

{{-- <section class="banner-section">
    <div class="mx-row">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 text-center text-lg-start">
             <p class="text-center text-lg-start">
              We are here to
             </p> 
             <p class="text-center text-lg-start">
              Keeping Your Devices New <img src="{{asset('uploads/star.png')}}" class=" img-fluid ms-3 rotate">
             </p>
             <div class="btn-group" role="group">
              <button type="button" class="btn rounded-0 border-0"><img src="{{asset('uploads/arrow.png')}}" alt=""></button>
              <button type="button" class="btn rounded-0 bg-white text-dark px-4">Read more</button>
            </div>
          </div>
          <div class="col-lg-6">
              <div class="text-center text-lg-end mt-lg-0 mt-5">
                  <img src="{{asset('uploads/banner-imge.png')}}" class="img-fluid banner-image">
              </div>
              <div class="image-circle">
                   <img src="{{asset('uploads/bg-setting-icons.png')}}" class="position-absolute">
                  <!--<img src="uploads/banner-phone.png" class="img-fluid"> -->
                  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img style="max-height: 125px;" class="img-fluid" src="{{asset('uploads/cat_iphone.png')}}" class="d-block w-100" alt="...">
                      </div>
                      @php
                        $i=0;
                      @endphp
                      @foreach($products as $product)
                        <div class="carousel-item {{($i==0)? 'active' : '' }}">
                          <img style="max-height: 125px;" class="img-fluid" src="{{$product->cat_img}}" class="d-block w-100" alt="...">
                        </div>
                        @php
                          $i++
                        @endphp
                        @endforeach
                        <div class="carousel-item">
                          <img src="{{asset('uploads/cat_watch.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{asset('uploads/cat_ipad.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{asset('uploads/cat_oneplus.png')}}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</section> --}}
{{-- @if(count($mainslider)>0) --}}
<section class="banner-section">
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach ($mainslider as $key=>$mainsliders)
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}" aria-current="true" aria-label="Slide 1"></button>
      @endforeach
    </div>

    <div class="carousel-inner">
      @foreach ($mainslider as $key=>$mainsliders)
      <div class="carousel-item {{(($key==0)? 'active' : '')}}" data-bs-interval="10000">
       <a href="{{$mainsliders->slide_link}}"> <img src="{{$mainsliders->image}}" class="d-block w-100" alt="..."> </a>
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <div>
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </div>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <div>
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </div>
    </button>
  </div>
  </div>
      </div>
</section>
{{-- @endif --}}
<section class="counter-section">
    <div class="mx-row">
        <div class="counter d-flex align-items-center py-4">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-sm-6 col-lg-3 my-4"><p class="c-number"> <span id="count1"></span>+</p><p class="c-title">Years of experience</p> </div>
                    <div class="col-sm-6 col-lg-3 my-4"><p class="c-number"><span id="count2"></span>+</p><p class="c-title">Our Technicians</p> </div>
                    <div class="col-sm-6 col-lg-3 my-4"><p class="c-number"><span id="count3"></span>+</p><p class="c-title">Repaired Devices</p> </div>
                    <div class="col-sm-6 col-lg-3 my-4"><p class="c-number"><span id="count4"></span>+</p><p class="c-title">Happy customers</p> </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="mx-row">
      <div class="container-fluid">
        <div class="row gx-5">
          <div class="col-md-6">
            <p class="title d-block d-lg-none">  Who we are ! <img src="{{asset('uploads/about-arrow.svg')}}" class="border-0 me-3 img-fluid left-arrow-img"> </p>
            <p class="sub-title">{{$pages->page_title}} </p>
              <p class="detail pb-3">{!!$pages->page_description!!}</p>
            <img src="{{$slide[0]->image}}" class="img-fluid d-none d-lg-block">
          </div>
          <div class="col-md-6 text-center text-lg-start">
            <p class="title text-end  d-none d-lg-block"> <img src="{{asset('uploads/about-arrow.svg')}}" class="border-0 me-3 img-fluid">  Who we are !  </p>
            <img src="{{$slide[1]->image}}" class="img-fluid">
            <div classs="actions-btn">
              <button class="btn">Learn more</button>
              {{-- <button class="btn btn-outline-dark rounded-0"><a href="{{ url('contact-us')}}"> Contact us</a></button> --}}
              <a href="{{ url('contact-us')}}" class="btn btn-outline-dark rounded-0" style="padding-top: 11px;"> Contact us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="fix">
  <div class="mx-row">
    <p class="title overline text-center px-4">What can we fix for you today?</p>
    <div class="container-fluid mt-5">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @foreach($products as $key => $product)
        {{-- @php        
              if($product->status=='active'){
                $cls = 'bg-success';
              } else {
                $cls = 'bg-info';
              }
        @endphp --}}
        
          <div class="col">
            <a href="{{url('product-list/'.$product->cat_slug)}}">
            <div class="img-block">
              <img class="img-fluid" src="{{$product->cat_img}}" alt="">
            </div>
            <p class="img-name">{{$product->cat_name}}</p>
          </a>
          </div>
        @endforeach
        <div class="col">
        <a href="{{url('mobile')}}">
          <div class="img-block">
            <img class="img-fluid" src="{{asset('uploads/mobile.jpg')}}" alt="">
          </div>
          <p class="img-name">Other Mobile</p>
        </a>
        </div>

        <div class="col">
          <a href="{{url('laptop')}}">
          <div class="img-block">
        <img class="img-fluid" src="{{asset('uploads/laptop.jpg')}}" alt="">
          </div>
          <p class="img-name">Other Laptop</p>
        </a>
        </div>
      </div>
    </div>
  </div>
</section>

{{------------ START BRAND SLIDER -----------}}

<section class="services-blog pb-5">
  <div class="upper-wave">
  </div>
  <p class="title text-center fw-500 text-white">Popular Brands</p>
    <div class="customer-logos slider mx-row pb-5">
      @foreach ($brand as $brand)
      <div class="slide-in-right slide"><img src="{{$brand->image}}"></div>
      @endforeach
    </div>
</section>

{{------------ END BRAND SLIDER -----------}}

<div class="bottom-wave">
</div>

<section class="why-choose-us">
  <div class="mx-row">
    <p class="title text-center">Why Choose us</p>
    <p class="details">
      No matter how big or small the issues are, we help you to get your device working smooth and fine just as new aspossible with the help of our specially skilled and experienced team of expert techies. We will literally bring your device back to life, fixing up anything and everything.
    </p>
    <div class="container-fluid">
      <div class="row gy-4 g-lg-3 g-xl-5">
        <div class="col-md-6 ms-0 text-center">
          <div class="feature-box">
            <img src="{{asset('uploads/fast-repair.png')}}" class="img-fluid">
            <p class="f-title">Fast-repair</p>
            <p class="f-info m-0">Fastest turnaround breakfix services for your devices. Try it to believe it.
            </p>
          </div>
        </div>

        <div class="col-md-6 ms-0 text-center">
          <div class="feature-box">
            <img src="{{asset('uploads/expert.png')}}" class="img-fluid">
            <p class="f-title">Expert Tech</p>
            <p class="f-info m-0">Best in breed technicians in state of art facility take care of your devices.
            </p>
          </div>
        </div>

        <div class="col-md-6 ms-0 text-center">
          <div class="feature-box">
            <img src="{{asset('uploads/spare-part.png')}}" class="img-fluid">
            <p class="f-title">Genuine Spare Parts</p>
            <p class="f-info m-0">We use best in quality and trusted genuine OEM spare parts for every repair.
            </p>
          </div>
        </div>

        <div class="col-md-6 ms-0 text-center">
          <div class="feature-box">
            <img src="{{asset('uploads/free.png')}}" class="img-fluid">
              <p class="f-title">Free Diagnostics</p>
              <p class="f-info m-0">We are honest in running a free diagnostic check with your device before taking it to repair.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{------------ START TESTIMONIALS -----------}}
<section class="testimonials mt-5 pt-5">
  <div class="container">
<p class="title overline text-center"> Client Testimonials</p>
  <div class="row">
    <div class="col-sm-12">
      <div id="customers-testimonials" class="owl-carousel">

        <!--TESTIMONIAL 1 -->
        @foreach ($testimonials as $testimonial)
        <div class="item">
          <div class="shadow-effect">
            <img class="img-circle" src="{{$testimonial->image}}" alt="">
            <p>{{$testimonial->testimonial}}</p>
          </div>
          <div class="testimonial-name">{{$testimonial->customer_name}}</div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  </div>
</section>
{{------------ END TESTIMONIALS -----------}}

<section class="video-section px-5">
  <div class="ms-row">
    <div id="videosList">   
      <div class="video"> 
        <video class="thevideo" loop preload="none" width="100%">
          <source src="{{asset('uploads/video.mp4')}}" type="video/mp4" class="w-100">
        </video>
      </div>
   </div>
   <div class="text-center">
    <button class="btn-purple border-0 mt-5">Learn more</button>
   </div>
  </div>
</section>

<section class="contact-form">
  <div class="mx-row">
    <div class="form-container">
      <p class="title text-white">
        contact us
      </p>
      <p class="text-white fs-5">demo text We use best in quality and trusted genuine OEM spare parts for every repair.</p>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      @if(session()->has('message'))
          <div class="alert alert-success text-center">
              {{ session()->get('message') }}
          </div>
      @endif

      @if(session()->has('error'))
          <div class="alert alert-danger text-center">
              {{ session()->get('error') }}
          </div>
      @endif
      <form action="{{ route('home-form') }}" method="POST">
        @csrf
        <div class="container-fluid p-0">
            <div class="row g-3">
              <div class="col-md-6"><input type="text" name="name" placeholder="Name" class="form-control form-control-lg rounded-0 "></div>
              <div class="col-md-6"><input type="text" name="phone" placeholder="Phone" class="form-control form-control-lg rounded-0 "></div>
              <div class="col-12"><textarea name="message" placeholder="Message" id="" cols="30" rows="10" class="form-control form-control-lg  rounded-0 "></textarea></div>
              <div class="col-12">
                <button class="btn btn-purple">SUBMIT</button>
              </div>
            </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- counter script -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
  function counter(id, start, end, duration) {
    let obj = document.getElementById(id),
    current = start,
    range = end - start,
    increment = end > start ? 1 : -1,
    step = Math.abs(Math.floor(duration / range)),
    timer = setInterval(() => {
      current += increment;
      obj.textContent = current;
      if (current == end) {
      clearInterval(timer);
      }
    }, step);
  }
  counter("count1", 0, 12, 3000);
  counter("count2", 100, 150, 2500);
  counter("count3", 0, 1220, 3000);
  counter("count4", 0, 1125, 3000);
  });
</script>

<script>
  jQuery(document).ready(function($) {
          "use strict";
          //  TESTIMONIALS CAROUSEL HOOK
          $('#customers-testimonials').owlCarousel({
              loop: true,
              center: true,
              items: 3,
              margin: 0,
              autoplay: true,
              dots:true,
              autoplayTimeout: 8500,
              smartSpeed: 450,
              responsive: {
                0: {
                  items: 1
                },
                768: {
                  items: 2
                },
                1170: {
                  items: 3
                }
              }
          });
        });
</script>
@endsection