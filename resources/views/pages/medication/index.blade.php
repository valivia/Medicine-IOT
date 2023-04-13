<x-layout>

    <x-profile :patient="$patient" route="medication" />

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
