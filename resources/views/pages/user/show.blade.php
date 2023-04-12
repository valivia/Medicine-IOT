@extends('index')

@section('content')
    <h1>Name: {{$user->first_name}}</h1>
@endsection

@include('partials.nav')
