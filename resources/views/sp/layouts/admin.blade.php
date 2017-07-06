<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
	@include('sp.layouts.partials.admin.htmlheader')
@show
<body class="{{ LAConfigs::getByKey('skin') }} {{ LAConfigs::getByKey('layout') }} 
					@if(LAConfigs::getByKey('layout') == 'sidebar-mini') sidebar-collapse @endif" 
					bsurl="{{ url('') }}" adminRoute="{{ config('sp.adminRoute') }}">

@include('sp.layouts.partials.admin.preloading')

<div class="wrapper">

	@include('sp.layouts.partials.admin.mainheader')

	@if(LAConfigs::getByKey('layout') != 'layout-top-nav')
		@include('sp.layouts.partials.admin.sidebar')
	@endif

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@if(LAConfigs::getByKey('layout') == 'layout-top-nav') <div class="container"> @endif
		@if(!isset($no_header))
			@include('sp.layouts.partials.admin.contentheader')
		@endif
    
		<!-- Main content -->
		<section class="content {{ $no_padding or '' }}">
		
			@if(!isset($no_message))
	    @include('sp.admin.partials.success_error')
	    @endif
			<!-- Your Page Content Here -->
			@yield('main-content')
		</section><!-- /.content -->

		@if(LAConfigs::getByKey('layout') == 'layout-top-nav') </div> @endif
	</div><!-- /.content-wrapper -->

	@include('sp.layouts.partials.admin.controlsidebar')

	@include('sp.layouts.partials.footer')

</div><!-- ./wrapper -->

@include('sp.layouts.partials.admin.file_manager')

@section('scripts')
	@include('sp.layouts.partials.admin.scripts')
@show

</body>
</html>
