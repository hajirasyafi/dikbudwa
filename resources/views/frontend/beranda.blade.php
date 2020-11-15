<!DOCTYPE html>
<html>
<head>
	<title>SMA Wahidiyah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/customs.css')}}">
	<link href="icons/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">
</head>
<body>

<div class="wrapper">
	<header class="header">
		<div class="py-sm-2 bg-light border-bottom">
			<div class="container">
				<div class="d-flex justify-content-between">
					<ul class="list-unstyled m-0">
						<li class="d-inline-block pr-3">
							<a href="tel:(0354)776202" class="d-inline-block">
								<i class="material-icons md-20 align-middle">phone</i>
								<span class="align-middle">(0354) 776202</span>
							</a>
						</li>
						<li class="d-inline-block pr-3">
							<a href="mailto:smaswahidiyah@gmail.com" class="d-inline-block">
								<i class="material-icons md-20 align-middle">email</i>
								<span class="align-middle">smaswahidiyah@gmail.com</span>
							</a>
						</li>
					</ul>
					<ul class="list-unstyled m-0">
						<li class="d-inline-block pr-3">
							<a href="tel:(0354)776202" class="d-inline-block">
								<i class="material-icons md-20 align-middle">phone</i>
								<span class="align-middle">(0354) 776202</span>
							</a>
						</li>
						<li class="d-inline-block pr-3">
							<a href="mailto:smaswahidiyah@gmail.com" class="d-inline-block">
								<i class="material-icons md-20 align-middle">email</i>
								<span class="align-middle">smaswahidiyah@gmail.com</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
</div>

<div class="header border-bottom border-top">
	<div class="py-3 bg-hijau">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="header-logo">
						<a href="#"><img src="{{asset('dikdasmen.png')}}" width="120" class="header-logo d-none d-sm-block"></a>
					</div>
					<div class="header-text">
						<h4 class="text-white">YAYASAN PERJUANGAN WAHIDIYAH DAN PONDOK PESANTREN KEDUNGLO</h4>
						<p class="lead text-white"><strong> Departemen Kebudayaan dan Pendidikan Dasar dan Menengah Wahidiyah</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow-sm" role="navigation">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavbarToggler01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="NavbarToggler01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item pr-4">
                    <a href="#" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item pr-4">
                    <a href="#" class="nav-link">Profil</a>
                </li>
                <li class="nav-item pr-4">
                    <a href="#" class="nav-link">Visi dan Misi</a>
                </li>
                <li class="nav-item pr-4">
                    <a href="#" class="nav-link">Ruang Lingkup</a>
                </li>
                <li class="nav-item pr-4">
                    <a href="#" class="nav-link">Organisasi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" role="main">
    <div id="carouseldikdasmen" class="carousel slide" data-ride="carousel">
    	<div class="carousel-inner">
    		<div class="carousel-item active">
    			<img src="{{asset('1.jpg')}}" class="d-block w-100">
    		</div>
    		<div class="carousel-item">
    			<img src="{{asset('2.jpg')}}" class="d-block w-100">
    		</div>
    	</div>
    	<a class="carousel-control-prev" href="#carouseldikdasmen" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
    	</a>
    	<a class="carousel-control-next" href="#carouseldikdasmen" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
    	</a>
    </div>
    <div class="row">
        @yield('content')
    </div>
</div>


<footer class="pt-4 my-md-5 pt-md-5 border-top footer">
    <div class="container">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="{{asset('dikdasmen.png')}}" alt="Dikbud" width="80" height="80">
            <small class="d-block mb-3 text-white-50">Copyright © Departemen Kebudayaan dan Pendidikan Dasar dan Menengah Wahidiyah</small>
          </div>
          <div class="col-6 col-md">
            <h5 class="text-white">Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5 class="text-white">Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5 class="text-white">About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
