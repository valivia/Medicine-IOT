@extends('index')

@section('content')
    @include('partials.nav')
    <h1>Create Timeslot</h1>

    <form class="form" method="POST" action="{{ route('patient.timeslot.store', $patient) }}">
        @method('POST')
        @csrf


        @include('partials/input', [
            'min' => 0,
            'max' => 23,
            'name' => 'hour',
            'label' => 'Hour',
            'type' => 'number',
            'value' => old('hour') ?? (int) date('H'),
            'required' => true,
        ])

        @include('partials/input', [
            'min' => 0,
            'max' => 59,
            'name' => 'minute',
            'label' => 'Minute',
            'type' => 'number',
            'value' => old('minute') ?? (int) date('i'),
            'required' => true,
        ])

        @include('partials/input', [
            'min' => 1,
            'max' => 7,
            'name' => 'day',
            'label' => 'Day',
            'type' => 'number',
            'value' => old('day') ?? (int) date('N'),
            'required' => true,
        ])

        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <button class="button" type="submit" data-variant="primary">
            Add Timeslot
        </button>

    </form>
@endsection
