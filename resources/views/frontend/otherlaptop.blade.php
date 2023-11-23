@extends('frontend.common.template')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">

<section class="service-banner">
  <div class="mx-row ">
    <p class="banner-title text-white">Laptop</p>
    <div class="text-white fs-5"> <a href="{{ url('/') }}"> Home </a> <span class="text-purple"> > </span>Laptop</div>
  </div>
</section>

<!-- product list -->
<section class="product-list-container">

  

  <div class="mx-row">
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
    <p class="title w-75 text-center overline"> For the Fastest Laptop Repair, Select 
      your Model and Issue</p>

      <div class="product-list container-fluid mt-5">
        <div class="row row-cols-375 row-cols-2  row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-4 g-2 g-sm-2 g-md-3 g-lg-4 g-xxl-5">
          
          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/apple.png')}}" class="img-fluid">
              <p class="product-name mb-0">Apple</p>
            </div>
          </a>
          </div>
          
          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/dell.png')}}" class="img-fluid">
              <p class="product-name mb-0">Dell</p>
            </div>
          </a>
          </div>
          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/hp.png')}}" class="img-fluid">
              <p class="product-name mb-0">HP</p>
            </div>
          </a>
          </div>

          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/asus.png')}}" class="img-fluid">
              <p class="product-name mb-0">Asus</p>
            </div>
          </a>
          </div>

          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/samsung.png')}}" class="img-fluid">
              <p class="product-name mb-0">Samsung</p>
            </div>
          </a>
          </div>

          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/lenovo.png')}}" class="img-fluid">
              <p class="product-name mb-0">Lenovo</p>
            </div>
          </a>
          </div>

          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/acer.png')}}" class="img-fluid">
              <p class="product-name mb-0">Acer</p>
            </div>
          </a>
          </div>

          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/msi.png')}}" class="img-fluid">
              <p class="product-name mb-0">MSI</p>
            </div>
          </a>
          </div>

          <div class="col mx-0">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
            <div class="product-box text-center rounded-5 bg-white p-4 mx-0">
              <img src="{{asset('uploads/laptop.jpg')}}" class="img-fluid">
              <p class="product-name mb-0">More/Other</p>
            </div>
          </a>
          </div>

        </div>
      </div>

  </div>

  <!-----------------------------MODAL---------------------------------------->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{url('query')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="exampleModalLabel">Enquiry Form</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                                <label>Your Name </label>
                                <input type="text" name="name" class="form-control bg-white text-dark" placeholder="Your Name">
                                <label class=" mt-3">Phone Number </label>
                                <input type="text" name="phone" class="form-control bg-white text-dark" placeholder="Phone Number">
                                <label class=" mt-3">Your Query</label>
                                <textarea name="message" id="" cols="30" rows="7" class="form-control bg-white text-dark"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center border-0">
                    <div class="m-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary-small">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
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
      <div id="customers-testimonials" class="owl-carousel">

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