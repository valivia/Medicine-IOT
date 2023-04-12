@extends('index')

@section('content')
    @foreach ($patients as $patient)
        <div class="patient">
            <h2>{{ $patient->first_name }} {{ $patient->last_name }}</h2>
            <p>{{ $patient->birthday }}</p>
            <p>{{ $patient->address }}</p>
            <a href="{{ route('patient.edit', $patient->id) }}">Edit</a>
            <form method="POST" action="{{ route('patient.destroy', $patient->id) }}">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete">
            </form>
        </div>
    @endforeach
@endsection

@include('partials.nav')
