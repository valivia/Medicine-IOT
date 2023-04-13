<x-layout>

    <x-card title="{{ $patient->first_name . ' ' . $patient->last_name }}" big={{true}}>
        <p>@include('partials/icons/location') {{ $patient->address }}</p>
        <p>@include('partials/icons/cake') {{ date('d-m-Y', strtotime($patient->birthday)) }}</p>
        <p>@include('partials/icons/device') {{ $patient->device_id }}</p>
        <section class="buttons">
            <a class="button" data-variant="secondary" href="{{ route('patient.show', $patient) }}">devices</a>
            <a class="button" data-variant="primary" href="{{ route('patient.medication.index', $patient) }}">medication</a>
            <a class="button" data-variant="secondary" href="{{ route('patient.timeslot.index', $patient) }}">timeslots</a>
        </section>
    </x-card>



    <x-cardlist title="Medications" createRoute="{{ route('patient.medication.create', $patient) }}">
        @foreach ($medications as $medication)
            <x-card title="{{ $medication->name }}"
                editRoute="{{ route('patient.medication.edit', compact(['patient', 'medication'])) }}"
                deleteRoute="{{ route('patient.medication.destroy', compact(['patient', 'medication'])) }}">
                <p>@include('partials/icons/location') {{ $medication->description }}</p>
            </x-card>
        @endforeach
    </x-cardlist>

</x-layout>
