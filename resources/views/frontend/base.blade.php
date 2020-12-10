<!DOCTYPE html>
<html lang="id">
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
	<title>Departemen Kebudayaan dan Pendidikan Dasar dan Menengah Wahidiyah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/customs.css')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">
  @yield('css')
</head>
<body>

<!-- <div class="wrapper">
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
</div> -->

<div class="header border-bottom border-top">
	<div class="py-3 bg-hijau">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="header-logo">
						<a href="{{url('/')}}"><img src="{{asset('dikdasmen.png')}}" width="120" class="header-logo d-none d-sm-block"></a>
					</div>
					<div class="header-text">
						<h4 class="text-white">Departemen Kebudayaan dan Pendidikan Dasar dan Menengah Wahidiyah</h4>
						<p class="lead text-white"><strong>YAYASAN PERJUANGAN WAHIDIYAH DAN PONDOK PESANTREN KEDUNGLO</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<nav class="navbar sticky-top navbar-expand-lg navbar-light shadow-sm" role="navigation" style="background-color: #ECEFF1">
    <div class="container">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#NavbarToggler01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="NavbarToggler01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item pr-4">
                    <a href="{{url('/')}}" class="nav-link">Beranda</a>
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
                <li class="nav-item pr-4 float-right">
                    <a href="#" class="nav-link">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container my-4" role="main">
  @yield('carousel')
    <div class="row">
        @yield('content')
    </div>
</div>


<footer class="pt-4 my-md-5 pt-md-5 border-top footer">
    <div class="container">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="{{asset('dikdasmen.png')}}" alt="Dikbud" width="80" height="80">
            <small class="d-block mb-3 text-white-50">Copyright © 2020 Departemen Kebudayaan dan Pendidikan Dasar dan Menengah Wahidiyah</small>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>
