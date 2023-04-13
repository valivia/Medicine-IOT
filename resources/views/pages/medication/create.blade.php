@extends('index')

@section('content')
    @include('partials.nav')
    <h1>Add Medication</h1>

    <form class="form" method="POST" action='{{ route('patient.medication.store', compact("patient") ) }}'>
        @method('POST')
        @csrf


        @include('partials/input', [
            'name' => 'name',
            'label' => 'Name',
            'placeholder' => 'Paracetamol',
            'value' => old('name'),
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'description',
            'label' => 'Description',
            'placeholder' => 'Description',
            'value' => old('description'),
            'required' => false,
        ])


        {{-- @include('partials/input', [
            'name' => 'dosage',
            'label' => 'Dosage',
            'type' => 'text',
            'placeholder' => '200 mg',
            'value' => old('dosage'),
            'required' => true,
        ]) --}}


        <button class="button" type="submit" data-variant="primary">
            Add Medication
        </button>

    </form>
@endsection
