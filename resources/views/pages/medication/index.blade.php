@extends('index')

@section('content')
    <div class="patients">
        <header class="patientsHeader">
            <h1>Patient</h1>
        </header>
        <div class="patientsMain">
        </div>
    </div>


    <x-card title="{{ $patient->first_name . ' ' . $patient->last_name }}" route="{{ route('patient.show', $patient) }}"
        editRoute="{{ route('patient.edit', $patient) }}" deleteRoute="{{ route('patient.destroy', $patient) }}">
        <p>@include('partials/icons/location') {{ $patient->address }}</p>
        <p>@include('partials/icons/cake') {{ date('d-m-Y', strtotime($patient->birthday)) }}</p>
    </x-card>

    <div class="patients">
        <header class="patientsHeader">
            <h1>Medication</h1>
            <a class="iconButton" href="{{ route('patient.medication.create',compact('patient')) }}">
                @include('partials/icons/add')
            </a>
        </header>
        <section>
            <a class="button" href="{{ route('patient.show', $patient) }}">devices</a>
            <a class="button" href="{{ route('patient.medication.index', $patient) }}">medication</a>
            <a class="button" href="{{ route('patient.timeslot.index', $patient) }}">timeslots</a>
        </section>
        <div class="patienstMain">
            @foreach ($medications as $medication)
                <x-card title="{{ $medication->name }}" editRoute="{{ route('patient.medication.edit', compact(['patient', 'medication'])) }}"
                    deleteRoute="{{ route('patient.medication.destroy', compact(['patient', 'medication'])) }}">
                    <p>@include('partials/icons/location') {{ $medication->description }}</p>
                </x-card>
            @endforeach
        </div>
    </div>
@endsection

@include('partials.nav')
