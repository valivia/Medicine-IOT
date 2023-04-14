<x-layout>

    <x-profile :patient="$patient" route="medication" />

    <x-cardlist title="Medications" createRoute="{{ route('patient.medication.create', $patient) }}">
        @foreach ($medications as $medication)
            <x-card title="{{ $medication->name }}"
                editRoute="{{ route('patient.medication.edit', compact(['patient', 'medication'])) }}"
                deleteRoute="{{ route('patient.medication.destroy', compact(['patient', 'medication'])) }}">

                {{-- Info --}}
                @isset($medication->description)
                    <p>@include('partials/icons/location') {{ $medication->description }}</p>
                @endisset

                <p>
                    @include('partials/icons/clock')
                    {{ $medication->timeslotCount }}
                    {{ Str::plural('timeslot', $medication->timeslotCount) }}
                </p>

            </x-card>
        @endforeach
    </x-cardlist>

</x-layout>
