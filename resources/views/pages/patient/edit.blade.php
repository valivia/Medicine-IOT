@extends('index')
@include('partials.nav')

@section('content')
    <form class="form" method="POST" action="{{ route('patient.update') }}">
        @method('PUT')
        @csrf

        <h2>Edit Patient</h2>

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
            'placeholder' => 'E.g. 01-01-2000',
            'value' => old('birthday') ?? $patient->birthday,
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

        <input class="button" type="submit" value="Update Patient">

    </form>
@endsection
