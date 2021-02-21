@extends('design.layout')
@section('content')
<div id="fh5co-main">

<div class="fh5co-narrow-content">
				<h1 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Messages</h1>
				@foreach($message as $msg)
				<div class="row">
               <div class="col-md-11">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<i class="icon-paperplane"></i>
							</div>
							<div class="fh5co-text">
								<form method="post" action="{{route('/addcomment')}}">
								{{ csrf_field() }}
								<h2>{{$msg->name}}</h2>
								<p>{{$msg->message}} .</p>
								<input  hidden="hidden"  type="text" name="messageid" value="{{$msg->id}}">
                                <div class="col-md-8">								
							

								<div class="form-group">
                    <input type="textArea" id="" name="content" placeholder="Comment" class="form-control" required/>
                </div>
                       @foreach($repl as $rep)
                      @if($rep->message_id == $msg->id)
                     <p style="border:solid 1px black;border-radius: 5px">{{$rep->content}} .</p>
                  @endif
                      @endforeach
                 <button id="addcomment" style="float: right;border-radius: 5px; " type="submit" class="btn btn-primary" onclick="">Add Comment</button>


                      <a href=" {{action('HomeController@showcomment','id='.$msg->id)}}" style="border-radius: 5px" type="submit" class="btn btn-primary" onclick="">Show Comments</a>


                     </form>


                      
							</div>

                  
							</div>

						</div>
					</div>


				</div>
				 @endforeach

				  {!! $message->links() !!}
				<hr>
</div>

</div>
@endsection

<script type="text/javascript">
	
	      function testJS()
          {
             document.getElementById("addcomment").style.visibility =  "visible"  ;
          }
</script>