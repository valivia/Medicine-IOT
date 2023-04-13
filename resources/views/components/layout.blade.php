@extends('index')

@section('content')
    @include('partials.nav')

    {{ $slot }}
@endsection
