@extends('layouts.app')

@section('header')
    <a href="{{ url('/') }}">Back to overview</a>
    <h2>
        {{ $cat->name }}
    </h2>
    <a href="{{ route('cat.edit', $cat->id) }}">
        <span class="fa fa-pencil-square-o"></span>
        Edit
    </a>

    <a href="{{ url('cat/'.$cat->id.'/delete') }}">Delete</a>

    <p>Last edited: {{ $cat->updated_at->diffForHumans() }}</p>
@stop

@section('content')
    <p>Date of birth: {{ $cat->date_of_birth }}</p>
    <p>
        @if ($cat->breed)
            Breed:
            {{ link_to('cat/breeds/'.$cat->breed->name, $cat->breed->name) }}
        @endif
    </p>
@stop