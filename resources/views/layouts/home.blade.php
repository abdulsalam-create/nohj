<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Minishop - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/open-iconic-bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}                   ">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}          ">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}     ">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}            ">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}                       ">
    <link rel="stylesheet" href="{{asset('frontend/css/ionicons.min.css')}}              ">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}      ">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.timepicker.css')}}         ">
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}                  ">
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}                   ">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}                     ">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
		@include('partials.nav')

	







    @yield('content')


    @include('partials.footer')


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{asset('frontend/js/jquery.min.js               ')}}"></script>
<script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js ')}}"></script>
<script src="{{asset('frontend/js/popper.min.js               ')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js            ')}}"></script>
<script src="{{asset('frontend/js/jquery.easing.1.3.js        ')}}"></script>
<script src="{{asset('frontend/js/jquery.waypoints.min.js     ')}}"></script>
<script src="{{asset('frontend/js/jquery.stellar.min.js       ')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js         ')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/aos.js                      ')}}"></script>
<script src="{{asset('frontend/js/jquery.animateNumber.min.js ')}}"></script>
<script src="{{asset('frontend/js/bootstrap-datepicker.js     ')}}"></script>
<script src="{{asset('frontend/js/scrollax.min.js             ')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('frontend/js/google-map.js               ')}}"></script>
<script src="{{asset('frontend/js/main.js                     ')}}"></script>

</body>
</html>
