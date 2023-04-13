<x-layout>
    <x-cardlist title="Patients" createRoute="{{ route('patient.create') }}">
            @foreach ($patients as $patient)
                <x-card title="{{ $patient->first_name . ' ' . $patient->last_name }}"
                    route="{{ route('patient.medication.index', $patient) }}" editRoute="{{ route('patient.edit', $patient) }}"
                    deleteRoute="{{ route('patient.destroy', $patient) }}">
                    <p>@include('partials/icons/location') {{ $patient->address }}</p>
                    <p>@include('partials/icons/cake') {{ date('d-m-Y', strtotime($patient->birthday)) }}</p>
                </x-card>
            @endforeach
    </x-cardlist>
</x-layout>
