@extends('design.layout')
@section('content')
<div id="fh5co-main">
     <div class="panel panel-default">
       <div class="panel-heading"><h3>Edit Part</h3></div>

</br>
  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whooops!! </strong> There were some problems with your input.<br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::model($Part, ['method'=>'PATCH','route'=>['parts.update', $Part->id]])!!}
    @include('design.form')
  {!! Form::close() !!}

</div>

  </div>
    @endsection