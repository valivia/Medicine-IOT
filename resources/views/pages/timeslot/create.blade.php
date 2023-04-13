@extends('index')

@section('content')
    @include('partials.nav')
    <h1>Create Timeslot</h1>

    <form class="form" method="POST" action="{{ route('patient.timeslot.store', $patient) }}">
        @method('POST')
        @csrf


        @include('partials/input', [
            'name' => 'hour',
            'label' => 'Hour',
            'type' => 'number',
            'value' => (int) date('G'),
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'minute',
            'label' => 'Minute',
            'type' => 'number',
            'value' => (int) date('i'),
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'day',
            'label' => 'Day',
            'type' => 'number',
            'value' => (int) date('d'),
            'required' => true,
        ])


        <button class="button" type="submit" data-variant="primary">
            Create Patient
        </button>

    </form>
@endsection
