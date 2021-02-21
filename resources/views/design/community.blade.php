@extends('design.layout')
@section('content')
<div id="fh5co-main">

<div class="fh5co-narrow-content">
				<h1 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Community</h1>

  <div class="panel panel-default">
    <div class="panel-heading">
    	<button style="border-radius: 5px" class="btn btn-success" data-toggle="modal" data-target="#addcommunity">Add New </button>
        

    	<a href="{{action('HomeController@showmyposts')}}" style="float: right;border-radius: 5px" class="btn btn-success" >My Posts </a>


    </div>
    <div class="panel-body">

				@foreach($message as $msg)
				<div class="row">
               <div class="col-md-11">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<i class="icon-paperplane"></i>
							</div>
							<div class="fh5co-text">
								<form method="post" action="{{route('/addcommunitycomment')}}">
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


                      <a href=" {{action('HomeController@showcommunitycomment','id='.$msg->id)}}" style="border-radius: 5px" type="submit" class="btn btn-primary" onclick="">Show Comments</a>


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
			</div>
</div>


<!-- // Modal -->

<div class="modal fade" id="addcommunity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Post</h4>
            </div>
           <form method="POST" action="{{route('/addpost')}}">
                        {{ csrf_field() }}
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Post </label>
                    <input type="text" id="" name="message" placeholder="Post" class="form-control" required/>
                </div>

           

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="">Add Post</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection

<script type="text/javascript">
	
	      function testJS()
          {
             document.getElementById("addcomment").style.visibility =  "visible"  ;
          }
</script>