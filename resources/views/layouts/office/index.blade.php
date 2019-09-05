<!DOCTYPE html>
<!-- 
Author: Muhamad Sahal
Contact: sahalmuhamad09@gmail.com
Follow: www.instagram.com/halssahal
-->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			{{ config('app.name') }} | {{ $title }}
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"></script> --}}
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="{{ asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="{{ asset('/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/assets/demo/demo9/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{ asset('/assets/demo/demo9/media/img/logo/favicon.ico') }}" />
		<link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m--skin- m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			@include('layouts.office.header')	
			
			@include('layouts.office.left-side')					

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-container--full-height">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">
						@include('layouts.office.subheader')

						<div class="m-content">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
			
			<!-- end:: Body -->
			
			@include('layouts.office.footer')

		</div>
		<!-- end:: Page -->
		
		@include('layouts.office.quick-sidebar')		    
	    
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!--begin::Base Scripts -->
		

		<script src="{{ asset('/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/demo/demo9/base/scripts.bundle.js') }}" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
		<script type="text/javascript" src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
		<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
		<script >
			CKEDITOR.replace( 'content' );
		</script>
		
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>
		<!--end::Page Snippets -->   
		{{-- <script src="{{ asset('assets/app/js/virgi.js') }}" type="text/javascript"></script> --}}
		
		{{-- @include('sweetalert::view') --}}
		<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
		<script type="text/javascript" src="{{ asset('js/number-format/jquery.number.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('js/number-format/number-custom.js')}}"></script>
		
		@if(!empty($validator))
		{!! $validator->render() !!}
		@endif
		
		@stack('js')
		
		@if(!empty($validator))
			{!! $validator->render() !!}
			@endif
			<script>
			$( document ).ready(function() {
				$('.datepicker').datepicker({
					format: 'yyyy-mm-dd'
				});
			});

			$("body").on("click", ".btn-delete-on-table", function (e) {
				e.preventDefault();
				var thisUrl = $(this).attr("href");
				swal({
					title: 'Apakah kamu yakin ?',
					text: 'Harap pastikan jika Anda ingin menghapus data ini',
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya, hapus saja!',
					cancelButtonText: 'Tidak, tetap simpan'
				}).then((result) => {
					if (result.value) {
						$(".form-delete").submit();
					}
				})
			});
			</script>
		<script src="{{ asset('assets/vendors/custom/flot/flot.bundle.js') }}"></script>
		@yield('footer')
		@include('sweetalert::view')
	</body>
	<!-- end::Body -->
</html>
