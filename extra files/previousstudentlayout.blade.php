<!doctype html>
<html lang="en">
  <head>
  	<title>Quiz App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="/student/dashboard" class="logo">Welcome, {{ auth()->user()->username }}</a></h1>
        <ul class="list-unstyled components mb-5">
          {{-- <li class="active">
            <a href="/dashboard"><span class="fa fa-home mr-3"></span> profile</a>
          </li>
          <li>
              <a href="/classes"><span class="fa fa-user mr-3"></span> class</a>
          </li> --}}
          <li  class="active">
            <a href="/student/dashboard"><span class="nav-link active fa fa-sticky-note mr-3"></span> Dashboard</a>
          </li>
          <li class="active">
            <a href="/show-classes"><span class="nav-link fa fa-sticky-note mr-3"></span> Classes</a>
          </li>
          <li>
            <a href="/show-exams"><span class="nav-link fa fa-sticky-note mr-3"></span> Exams</a>
          </li>
          <li>
            <a href="/previous-exams"><span class="nav-link fa fa-sticky-note mr-3"></span> Previous Exams</a>
          </li>
          <li>
            <a href="/logout"><span class="nav-link fa fa-sticky-note mr-3"></span> logout</a>
          </li>
          {{-- <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li> --}}
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
        @yield('student-content-area')
		</div>

    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/popper.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script>
      $(document).ready(function(){
    $('.nav-link').each(function(){
        if ($(this).attr('href') == window.location.pathname){
            $(this).parent().addClass('active');
        }
    });
});

    </script>
  </body>
</html>