
<div class="form-group">
 {!! Form::label('name', 'Name') !!}
  <div class="form-controls">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('date_of_birth', 'Date Of Birth') !!}
  <div class="form-controls">
    {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group" >
  {!! Form::label('address', 'Address') !!}
  <div class="form-controls" >
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('shool_id', 'Class') !!}
  <div class="form-controls">
    {!! Form::select('school_id', $schools, null, ['class' => 'form-control']) !!}
    <br>
  
  </div>
</div>

{!! Form::submit('Save student', ['class' => 'btn btn-primary']) !!}