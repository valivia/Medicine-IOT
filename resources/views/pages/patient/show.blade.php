@extends('index')

@section('content')
        <section>
            <a class="button" href="{{ route('patient.show', $patient) }}">devices</a>
            <a class="button" href="{{ route('patient.medication.index', $patient) }}">medication</a>
            <a class="button" href="{{ route('patient.timeslot.index', $patient) }}">timeslots</a>
        </section>
@endsection

@include('partials.nav')
