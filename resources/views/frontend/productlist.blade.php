@extends('frontend.common.template')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">

<section class="service-banner">
  <div class="mx-row ">
    <p class="banner-title text-white">{{$Category->cat_name}} Services</p>
    <div class="text-white fs-5"> <a href="{{ url('/') }}"> Home </a> <span class="text-purple"> > </span>{{$Category->cat_name}} Services</div>
  </div>
</section>

<!-- product list -->
<section class="product-list-container">

  <div class="mx-row">
    <p class="title w-75 text-center overline"> For the Fastest {{$Category->cat_name}} Repair, Select 
      your Model and Issue</p>

      <div class="product-list container-fluid mt-5">
        <div class="row row-cols-375 row-cols-2  row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-4 g-2 g-sm-2 g-md-3 g-lg-4 g-xxl-5">
          
          @foreach($product as $key => $prod)
          <div class="col mx-0">
            <a href="{{url('product-details/'.$prod->slug)}}">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{$prod->img}}" class="img-fluid">
              <p class="product-name mb-0">{{$prod->name}}</p>
            </div>
          </a>
          </div> 
          @endforeach
        </div>
      </div>

  </div>

</section>

<!-- why choose us-->
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

<!-- TESTIMONIALS -->

<section class="testimonials mt-5 pt-5">
  <div class="container">
<p class="title overline text-center"> Client Testimonials</p>
  <div class="row">
    <div class="col-sm-12">
      <div id="customers-testimonials" class="owl-carousel product-list">

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

<!-- END OF TESTIMONIALS -->


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