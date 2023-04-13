@extends('index')

@section('content')
    @include('partials.nav')
    <h1>Edit Medication</h1>

    {{-- <a class="button" data-variant="primary" href="{{ route('medication.index') }}">Back</a> --}}

    <form class="form" method="POST" action='{{ route('patient.medication.update', compact(["medication", "patient"]) ) }}'>
        @method('PUT')
        @csrf


        @include('partials/input', [
            'name' => 'name',
            'label' => 'Name',
            'placeholder' => 'Paracetamol',
            'value' => old('name') ?? $medication->name,
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'description',
            'label' => 'Description',
            'placeholder' => 'Description',
            'value' => old('description') ?? $medication->description,
            'required' => false,
        ])


        <button class="button" type="submit" data-variant="primary">
            Edit Medication
        </button>

    </form>
@endsection
