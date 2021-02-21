

<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Part Name : </strong>
      {!! Form::text('spareparts', null, ['placeholder'=>'Part Name','class'=>'form-control']) !!}
    </div>
  </div>
   <div class="col-xs-12">
    <div class="form-group">
      <strong>Company : </strong>
      {!! Form::text('mainfactor', null, ['placeholder'=>'Company','class'=>'form-control']) !!}
    </div>
  </div>
   <div class="col-xs-12">
    <div class="form-group">
      <strong>Price : </strong>
      {!! Form::text('price', null, ['placeholder'=>'Price','class'=>'form-control']) !!}
    </div>
  </div>
 
  <div class="col-xs-12">
    <a class="btn btn-xs btn-success" href="{{ route('parts.index') }}">Back</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
  </div>
</div>

</div>
