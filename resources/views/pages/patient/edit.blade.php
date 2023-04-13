@extends('index')

@section('content')
    @include('partials.nav')
    <form class="form" method="POST" action="{{ route('patient.update', $patient) }}">
        @method('PUT')
        @csrf

        <h2>Edit Patient</h2>

        {{-- <a class="button" data-variant="primary" href="{{ route('patient.index') }}">Back</a> --}}

        @include('partials/input', [
            'name' => 'first_name',
            'label' => 'First Name',
            'placeholder' => 'E.g. John',
            'value' => old('first_name') ?? $patient->first_name,
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'last_name',
            'label' => 'Last Name',
            'placeholder' => 'E.g. Doe',
            'value' => old('last_name') ?? $patient->last_name,
            'required' => true,
        ])


        @include('partials/input', [
            'name' => 'birthday',
            'label' => 'Birthday',
            'type' => 'date',
            'placeholder' => 'E.g. 01-01-2000',
            'value' => old('birthday') ?? date('Y-m-d', strtotime($patient->birthday)),
            'required' => true,
        ])


        @include('partials/input', [
            'name' => 'address',
            'label' => 'Address',
            'placeholder' => 'E.g. 1234 Street',
            'value' => old('address') ?? $patient->address,
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'device_id',
            'label' => 'Device ID',
            'placeholder' => 'E.g. 123456789',
            'value' => old('device_id') ?? $patient->device_id,
            'required' => true,
        ])

        <button class="button" type="submit" data-variant="primary">
            Create Patient
        </button>

    </form>
@endsection
