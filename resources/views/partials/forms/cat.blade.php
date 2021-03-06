<div class="form-group">
    {!! Form::label('photo', "Photo") !!}
    <div class="form-controls">
        {!! Form::file('photo', ['required' => 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    <div class="form-controls">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_of_birth', 'Date of Birth') !!}
    <div class="form-controls">
        {!! Form::date('date_of_birth', null, ['class' => 'form_control', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('breed_id', 'Breed') !!}
    <div class="form-controls">
        {!! Form::select('breed_id', $breeds, null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>

{!! Form::submit('Save Cat', ['class' => 'btn btn-primary']) !!}