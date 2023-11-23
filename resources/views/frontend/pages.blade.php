@extends('frontend.common.template')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">

<section class="service-banner">
  <div class="mx-row ">
    <p class="banner-title text-white">{{$Page->page_title}}</p>
    <div class="text-white fs-5"> <a href="{{ url('/') }}"> Home </a> <span class="text-purple"> > </span>{{$Page->page_title}}</div>
  </div>
</section>

<!-- product list -->
<section class="page-content">

  {!!$Page->page_description!!}

</section>
@endsection