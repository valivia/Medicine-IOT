@extends('index')

@section('content')
    <div class="patients">
        <header class="patientsHeader">
            <h1>Patients</h1>
            <a class="iconButton" href="{{ route('patient.create') }}">
                @include('partials/icons/add')
            </a>
        </header>


        <div class="patientsMain">
            @foreach ($patients as $patient)
                <x-card title="{{ $patient->first_name . ' ' . $patient->last_name }}"
                    editRoute="{{ route('patient.edit', $patient) }}" deleteRoute="{{ route('patient.destroy', $patient) }}">
                    <p>@include('partials/icons/location') {{ $patient->address }}</p>
                    <p>@include('partials/icons/cake') {{ date('d-m-Y', strtotime($patient->birthday)) }}</p>
                </x-card>
            @endforeach
        </div>
    </div>
@endsection

@include('partials.nav')
