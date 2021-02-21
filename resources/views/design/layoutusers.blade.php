
@include('design.layoutuser.header')

	
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>

		@include('design.layoutuser.aside')

		@yield('content')
	</div>

	@include('design.layoutuser.footer')
