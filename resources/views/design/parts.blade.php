

    
    
    @extends('design.layout') 
    




@section('content')
<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"> Our Parts </h2>
 @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

				<div class="row row-bottom-padded-md">
					 @foreach($parts as $part)
					<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
							<a href="#" class="blog-img"><img src="{{$part->image}}" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
							<div class="desc">
								<h3><a href="#">Name: {{$part->spareparts}}</a></h3>
								<span><small>by Admin </small> / <small> {{ Auth::user()->fname }} {{ Auth::user()->lname }} </small> / <small> <i class="icon-comment"></i>{{$part->id}}</small></span>
								<p>Company: {{$part->mainfactor}}</p>
								<p style="color: red">Price: {{$part->price}} $</p>
								 
								<a id="{{$part->id}}" onclick="testJS(this)" href="#" data-toggle="modal" data-target="#buy_part" style="float: right;color: blue" class="lead">Buy <i class="icon-arrow-right3" ></i></a>
								<a style="float: left; color: blue" 
								href="{{ action('AllpartsController@more','id='.$part->id ) }}" class="lead">Show Photo <i class="icon-arrow-right3"></i></a>

							</div>
						</div>
					</div>
		
		


                       @endforeach  
				
				</div>
			</div>
		
<script type="text/javascript">
	function testJS(elem)
          {
          	 var ID_String =elem.id.toString();
        	 document.getElementById("partidd").value = ID_String;
	      }
</script>

		<!-- // Modal -->

<div class="modal fade" id="buy_part" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buy This Part</h4>
            </div>
           <form method="POST" action="{{route('/buypart')}}">
                        {{ csrf_field() }}
            <div class="modal-body">

                <div hidden="hidden" class="form-group">
                    <label for="">Part id</label>
                    <input type="text" id="partidd"  name="part_id" placeholder="Part id" class="form-control"   />
                </div>

                <div hidden="hidden" class="form-group">
                    <label for="">User id</label>
                    <input value=" {{ Auth::user()->id }} " type="text" id="user_id" name="user_id" placeholder="User Id" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="">User Phone</label>
                    <input type="text" id="" name="userphone" placeholder="User Phone" class="form-control" required/>
                </div>

                 <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" id="" name="quantity" placeholder="Part Quantity" class="form-control" required/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="">Purchase</button>
            </div>
            </form>
        </div>
    </div>
</div>
			
		</div>
		@endsection