<footer id="footer">
  <div class="mx-row">
    <div class="container-fluid">
      <div class="row py-5">
        <div class="col-sm-7 col-lg-4 mx-0 pe-4">
          <a class="navbar-brand p-0 ms-0" href="{{ url('/') }}"><img src="{{asset('uploads/logo-white.png')}}" class="img-fluid"></a>
          <p class="mt-3 text-white mt-4 ">{!! Str::words($pages->page_description, 36, ' ...') !!}</p>
          <div class="social-icons mt-4">
            <a href="#"><button class="btn btn-purple me-2"> <i class="bi bi-twitter"></i></button></a>
            <a href="#"><button class="btn btn-purple me-2"> <i class="bi bi-facebook"></i></button></a>
            <a href="#"><button class="btn btn-purple me-2"> <i class="bi bi-instagram"></i></button></a>
            <a href="#"><button class="btn btn-purple me-2"> <i class="bi bi-linkedin"></i></button></a>
          </div>
        </div>
        <div class="col-sm-5  col-lg-2">
          <p class="menu-itle">Important Links</p>
          <ul class="menu-list p-0 mt-2 mt-md-5">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{url('about-us')}}">About Us</a></li>
            {{-- <li><a href="#">Testimonial</a></li> --}}
            {{-- <li><a href="#">Services</a></li> --}}
            <li><a href="{{url('contact-us')}}">Contact us</a></li>
            <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
            <li><a href="{{url('terms-and-conditions')}}">Terms and Conditions</a></li>
            {{-- <li><a href="{{url('pages/'.$policy->page_slug)}}">{{$policy->page_title}}</a></li>
            <li><a href="{{url('pages/'.$termsconditions->page_slug)}}">{{$termsconditions->page_title}}</a></li> --}}
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 pe-3">
          <p class="menu-itle">Contact Info</p>
          
          <ul class="menu-list p-0 mt-2 mt-md-5">
            <li><button class="btn btn-purple me-2"> <i class="bi bi-house-fill"></i></button> {{$user->address}} </li>
            <li><a href="tel:{{$user->phone}}"><button class="btn btn-purple me-2"> <i class="bi bi-telephone-fill"></i></button> {{$user->phone}}</a></li>
            <li><a href="mailto:{{$user->email}}"><button class="btn btn-purple me-2"> <i class="bi bi-envelope-fill"></i></button> {{$user->email}}</a></li>
          </ul>
        </div>
        
        <div class="col-sm-6 col-lg-3 position-relative">
          <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=453&amp;height=226&amp;hl=en&amp;q=mohali&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpedls.com/">minecraft download</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:226px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:226px;}.gmap_iframe {height:226px!important;}</style></div>
          
        </div>

      </div>
    </div>
  </div>
  <div class="sub-footer">
    <div class="mx-row">
        <p>Copyright © 2022 <a href="ComputerMobilezone.com">ComputerMobilezone</a> . All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- Brand Slider -->
<script>
  $(document).ready(function(){
    $('.customer-logos').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
    nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
    responsive: [{
      breakpoint: 769,
      settings: {
        slidesToShow: 3
      }
    }, {
      breakpoint: 520,
      settings: {
        slidesToShow: 1
      }
    }]
    });
  });
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>




<script>
var figure = $(".video").hover( hoverVideo, hideVideo );

function hoverVideo(e) {  
    $('video', this).get(0).play(); 
}

function hideVideo(e) {
    $('video', this).get(0).pause(); 
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>