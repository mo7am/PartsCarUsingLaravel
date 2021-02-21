@extends('design.layout')
@section('content')
<div id="fh5co-main">
<div class="row">
    <div class="col-lg-12">
      <div class="pull-left">
        <h3>Add New Part</h3>
      </div>
    </div>
  </div>

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

  {!! Form::open(['route' => 'parts.store', 'method' => 'POST']) !!}
    @include('design.form')
  {!! Form::close() !!}
</div>

    </div>
    @endsection