@extends('layouts.master')

@section('header')
    <a href="{{ url('/') }}">Back to overview</a>
    <h2>
        {{ $cat->name }}
    </h2>
    <a href="{{ url('cats/'.$cat->id.'/edit') }}">
        <span class="fa fa-pencil-square-o"></span>
        Edit
    </a>
    <a href="{{ url('cats/'.$cat->id.'/delete') }}">
        <span class="fa fa-trash-o"></span>
        Delete
    </a>
    <p>Last edited: {{ $cat->updated_at->diffForHumans() }}</p>
@stop

@section('content')
    <p>Date of birth: {{ $cat->date_of_birth }}</p>
    <p>
        @if ($cat->breed)
            Breed:
            {{ link_to('cats/breeds/'.$cat->breed->name, $cat->breed->name) }}
        @endif
    </p>
@stop