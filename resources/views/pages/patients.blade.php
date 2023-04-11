@extends('index')

@section('content')
    <h1>Patienten</h1>
    <section class="patients">
        @include('partials.patient')
    </section>

    <section class="buttons">
        <button class="button" data-variant="secondary" type="button">Nieuw</button>
    </section>
@endsection

@include('partials.nav')
