@extends('frontend.common.template')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-details.css') }}">

<section class="common-banner">
  <div class="mx-row ">
    <p class="banner-title text-white fs-50">{{$Product->name}}</p>
    <p class="text-white fs-5"> <a href="{{ url('/')}}"> Home </a> <span class="text-purple"> > </span><a href="{{ url()->previous() }}">{{$Product->category->cat_name}}</a><span class="text-purple"> > </span> {{$Product->name}}</p>
  </div>
</section>

<section class="service-detail container-fluid"> 
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
      
        <p class="title w-75 text-center overline mb-5  "> For the Fastest {{$Product->name}} Repair, Select your Model and Issue</p>

        <div class="row row-cols-1  row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3 g-lg-4 g-64">
          @foreach($Productissue as $key => $prod)
            <div class="col mx-0">
                <div class="service-block bg-white">
                    <img src="{{$prod->image}}"  class="img-fluid w-100 rounded-10">
                    <p>{{$prod->isuue_name}}</p>
                    <button type="button" class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#exampleModal">Repair Now</button>
                </div>
            </div>
            @endforeach
            
        </div> 
  </div>

  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{url('query')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-0" id="exampleModalLabel">Modal title</h5>
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

<section class="benefits mx-row">
    <p class="title text-center pt-5 text-white overline">What do I get from my  <br> {{$Product->name}} Repair?</p>
</section>

<section class="benefits-cards px-3">
    <div class="contai mx-row-1000 text-center">
            <div class="row  row-cols-1 row-cols-lg-3 g-md-3 g-39">
                <div class="col text-center">
                    <img src="{{asset('uploads/pickup.png')}}" class="img-fluid">
                    <p class="fs-22">FREE PICKUP AND DROP</p>
                    <p>We provide a free pickup and drop from more than 28000 pin codes across India, so no matter where you are, there is no excuse to not choose Rapid Repair</p>
                </div>

                <div class="col text-center">
                    <img src="{{asset('uploads/money.png')}}" class="img-fluid">
                    <p class="fs-22">100% MONEY BACK GUARANTEE</p>
                    <p>We are so confident in our services that we offer a 100% money back guarantee in case you are not satisfied for any reason with the repair. No questions asked
                    </p>
                </div>

                <div class="col text-center">
                    <img src="{{asset('uploads/warrenty.png')}}" class="img-fluid">
                    <p class="fs-22">LIFETIME SERVICE WARRANTY</p>
                    <p>Our parts are of the highest quality and this allows us to offer you a Lifetime warranty on the device for all parts, except battery
                    </p>
                </div>

            </div>
            
            <button class="btn btn-purple text-white m-auto mb-5">
               <a href="{{ url('contact-us')}}"> Get in Touch</a>
            </button>
            {{-- <a class="btn btn-purple text-white m-auto mb-5" href="{{ url('contact-us')}}" style="padding: 11px 25px;"> Get in Touch</a> --}}
    </div>
</section>

{{-- <section class="cool-features px-3">
    <div class="mx-row">
        <div class="conatiner-fluid">
            <div class="row">
                <div class="col-lg-6 text-center mb-5 mb-lg-0">
                    <img src="{{$Product->feature_image}}" class="img-fluid m-auto">
                </div>
                <div class="col-lg-6">
                   <p class="title m-0">Some cool </p>
                   <p class="title overline">{{$Product->name}} features</p>

                   <div class="list w-100">
                    <div class="d-flex align-items-start">
                        <img src="{{asset('uploads/CheckAll.svg')}}"  class="img-fluid m-0">
                        <p class="m-0 mt-1 ms-2 mb-3">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="d-flex align-items-start">
                        <img src="{{asset('uploads/CheckAll.svg')}}"  class="img-fluid m-0">
                        <p class="m-0 mt-1 ms-2 mb-3">Paragraph of text beneath the heading to explain the heading beneath the heading to explain the heading.</p>
                    </div>

                    <div class="d-flex align-items-start">
                        <img src="{{asset('uploads/CheckAll.svg')}}"  class="img-fluid m-0">
                        <p class="m-0 mt-1 ms-2 mb-3">Paragraph of text beneath the heading to explain the heading heading to explain the heading.</p>
                    </div>

                    <div class="d-flex align-items-start">
                        <img src="{{asset('uploads/CheckAll.svg')}}"  class="img-fluid m-0">
                        <p class="m-0 mt-1 ms-2 mb-3">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="d-flex align-items-start">
                        <img src="{{asset('uploads/CheckAll.svg')}}"  class="img-fluid m-0">
                        <p class="m-0 mt-1 ms-2 mb-3">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="d-flex align-items-start">
                        <img src="{{asset('uploads/CheckAll.svg')}}"  class="img-fluid m-0">
                        <p class="m-0 mt-1 ms-2 mb-3">Paragraph of text beneath the heading to explain the heading Paragraph of text beneath the heading.</p>
                    </div>

                   </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection