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
                    {{-- {{ $medication->timeslotCount }}
                    {{ Str::plural('timeslot', $medication->timeslotCount) }} --}}
                    {{ $medication->timeslots->map(function ($timeslot) {
                            return date('D', strtotime("Sunday +{$timeslot->day} days")) . " " . str_pad($timeslot->hour, 2, '0', STR_PAD_LEFT) . ':' . str_pad($timeslot->minute, 2, '0', STR_PAD_LEFT);
                        })->join(', ') }}
                </p>

            </x-card>
        @endforeach
    </x-cardlist>

</x-layout>
