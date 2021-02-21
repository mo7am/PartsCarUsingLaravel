
@include('design.layouts.header')

	
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>


       @if (Auth::user()->type_id == 1)
		@include('design.layouts.aside')
		@else

        @include('design.layoutuser.aside')
        @endif
		@yield('content')
	</div>

	@include('design.layouts.footer')
