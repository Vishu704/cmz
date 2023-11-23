@extends('frontend.common.template')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">

<section class="service-banner">
  <div class="mx-row ">
    <p class="banner-title text-white">Contact Us</p>
    <div class="text-white fs-5"> <a href="{{ url('/') }}"> Home </a> <span class="text-purple"> > </span>Contact Us</div>
  </div>
</section>

<div class="background-map">

    <section class="info mx-row my-5    pt-5">

        <div class="container-fluid">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-lg-3 gx-xl-5">

                    <div class="col mt-3 mx-0">
                        <div class=" bg-light py-5 text-center rounded-10 p-4 h-100">
                            <i class="bi bi-envelope-at-fill fs-50"></i>
                            <a href="mailto:{{$user->email}}" class="fs-22 text-muted d-block mt-3">{{$user->email}}</a>
                        </div>
                    </div>

                    <div class="col mt-3 mx-0">
                        <div class=" bg-light  py-5 text-center rounded-10 p-4 h-100">
                            <i class="bi bi-geo-fill fs-50"></i>
                            <a href="#" class="fs-22 text-muted d-block mt-3">{{$user->address}}</a>
                        </div>
                    </div>

                    <div class="col mt-3 mx-0">
                        <div class=" bg-light  py-5 text-center rounded-10 p-4 h-100">
                            <i class="bi bi-phone-fill fs-50 text"></i>
                            <a href="tel:{{$user->phone}}" class="fs-22 text-muted d-block mt-3">{{$user->phone}}</a>
                    </div>
                    </div>

                </div>
        </div> 

    </section>  

    <section class="form mx-row my-5 px-20 pb-5">
        <p class="title my-5 pt-5"> Send us a Message </p>
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
        <form action="{{ url('contact-query') }}" method="POST">
          @csrf
            <label>Your Name </label>
            <input type="text" name="name" class="form-control bg-white text-dark rounded-0" placeholder="Your Name">
            <label class=" mt-3">Phone Number </label>
            <input type="text" name="phone" class="form-control bg-white text-dark rounded-0" placeholder="Phone Number">
            <label class=" mt-3">Your Query</label>
            <textarea name="message" id="" cols="30" rows="7" class="form-control bg-white text-dark rounded-0"></textarea>

            <button class="btn btn-purple mt-4">Submit</button>
        </form>
    </section>
</div>
<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d219515.3747866946!2d76.7007429979195!3d30.720432015301093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fee85b4197c03%3A0x956f78ae7deb5a95!2sThe%20Computer%20%26%20Mobile%20Zone%20(Mobile%20Repair%2FLaptop%20Repair%2FCCTV%20Cameras)!5e0!3m2!1sen!2sin!4v1671715124146!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@endsection