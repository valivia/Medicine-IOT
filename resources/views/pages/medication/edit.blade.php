@extends('index')

@section('content')
    <form class="form" action='{{ route('patient.medication.update', compact(["patient", "medication"]) ) }}'>
        @method('POST')
        @csrf
        <h2>Edit Medication</h2>

        <section class="formSection">
            <label for="name">Name</label>
            <input placeholder="Name" type="text" id="name" name="name">
        </section>

        <section class="formSection">
            <label for="description">Description</label>
            <input placeholder="Description" type="text" id="description" name="description">
        </section>

        <section class="formSection">
            <label for="dosage">Dosage</label>
            <input placeholder="Dosage" type="text" id="dosage" name="dosage">
        </section>
    </form>
@endsection

@include('partials.nav')
