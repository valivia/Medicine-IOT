<x-layout>

    <x-profile :patient="$patient" route="timeslot" />

    <x-cardlist title="Timeslots" createRoute="{{ route('patient.timeslot.create', $patient) }}">
        @foreach ($timeslots as $timeslot)
            <x-card title="{{ str_pad($timeslot->hour, 2, '0', STR_PAD_LEFT) . ':' . str_pad($timeslot->minute, 2, '0', STR_PAD_LEFT) }}"
                editRoute="{{ route('patient.timeslot.edit', [$patient, $timeslot]) }}"
                deleteRoute="{{ route('patient.timeslot.destroy', [$patient, $timeslot]) }}">
                <p>
                    @include('partials/icons/date')
                    {{ date('l', strtotime("Sunday +{$timeslot->day} days")) }}
                </p>

                <p>
                    @include('partials/icons/meds')
                    {{ $timeslot->medicationCount }}
                    {{ Str::plural('medication', $timeslot->medicationCount) }}
                </p>

            </x-card>
        @endforeach
    </x-cardlist>

</x-layout>
