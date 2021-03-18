<!DOCTYPE html>
<html>
<head>
	<!-- icon -->
	<link rel="icon" href={{ asset('assets/img/favicon.ico') }} sizes="32x32">

	<!-- title -->
	<title>Daftar Menu</title>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- custom css -->
	<link rel="stylesheet" href={{ asset('assets/css/style.css') }}>

	<!-- bootstrap core -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<!-- fontawesome -->
	<script src={{ asset('assets/fawesome/all.min.js') }}></script>
    @livewireStyles
</head>
<body>

		<div class="spinner-border text-primary" id="spinner" role="status"> 
        	<span class="sr-only">Loading...</span> 
    	</div> 
    	<div id="data"></div> 

		<script src={{ asset('assets/js/style.js') }}></script>
		<!---------------------------------------------------------------------------->

		<!-- nav menu -->
		@livewire('nav.nav-bar')


        <div class="container">
			{{ $slot }}
		</div>
		@livewireScripts
</body>
</html>