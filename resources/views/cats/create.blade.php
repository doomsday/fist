@extends('layouts.app')

@section('header')
    <h2>Add a new cat</h2>
@stop

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    {!! Form::open(['url' => '/cat', 'files' => true]) !!}
    @include('partials.forms.cat')
    {!! Form::close() !!}
@stop