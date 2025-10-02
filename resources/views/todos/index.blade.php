@extends('layouts.app')

@section('content')
    <h3>OK</h3>
    @foreach ($todos as $todo)
        <p>{{$todo->title}}</p>
    @endforeach
@endsection
