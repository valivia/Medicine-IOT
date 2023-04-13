@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('medication.store') }}">
        <h2>Create Medication</h2>

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

        <button class="button" type="submit" data-variant="primary">
            Add Medication
        </button>
    </form>
@endsection

@include('partials.nav')
