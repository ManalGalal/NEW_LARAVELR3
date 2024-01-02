<!doctype html>
<html class="no-js" lang="zxx">
    <head>
       @include('includes.head')
    </head>
    <body>
	
		
	
        @include('includes.preloader')
		<!-- Header Area -->
		@include('includes.header')
		<!-- End Header Area -->
		@yield('breadcrum')
		@yield('content')
      
		<!-- Footer Area -->
		@include('includes.footerArea')
		<!--/ End Footer Area -->
		
		<!-- jquery Min JS -->
        @include('includes.footerJs')
		{{-- @include('includes.gMap') --}}


    </body>
</html>