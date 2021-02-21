@extends('design.layout')
@section('content')
<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Galary</h2>
                  

  

				<div class="row row-bottom-padded-md">
					 @foreach ($galaries as $galary)
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="work image-popup" style="background-image: url({{$galary->image}});">
							<div class="desc">
								<h3>Part Name : {{$galary->spareparts}}</h3>
								<h4>Company   : {{$galary->mainfactor}}</h4>
								<h5 style="color: red">Price     : {{$galary->price}} $</h5>
							</br>
								<span>By Admin</span>
							</div>
						</a>
					</div>
					@endforeach

					
			    </div>
				{!! $galaries->links() !!}
			</div>

			<div class="fh5co-narrow-content">
				<div class="row">
					<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
						<h1 class="fh5co-heading-colored">Get in touch</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
						<p class="fh5co-lead">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
					
				</div>
			</div>
		</div>
		@endsection