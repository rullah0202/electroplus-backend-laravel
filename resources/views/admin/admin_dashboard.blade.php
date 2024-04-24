<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('adminbackend/assets/images/favicon-32x32.png' )}}" type="image/png" />
	@include('admin.body.styles')
	<title>Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('admin.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @include('admin.body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
            @yield('admin')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
        @include('admin.body.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<!-- @include('admin.body.switcher') -->
	<!--end switcher-->
	@include('admin.body.scripts')
</body>

</html>