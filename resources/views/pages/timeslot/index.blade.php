<x-layout>

    <section>
        <a class="button" href="{{ route('patient.show', $patient) }}">devices</a>
        <a class="button" href="{{ route('patient.medication.index', $patient) }}">medication</a>
        <a class="button" href="{{ route('patient.timeslot.index', $patient) }}">timeslots</a>
    </section>


    <x-cardlist title="Timeslots" createRoute="{{ route('patient.timeslot.create', $patient) }}">
        @foreach ($timeslots as $timeslot)
            <x-card title="{{ $timeslot->hour . ':' . $timeslot->minute }}"
                editRoute="{{ route('patient.timeslot.edit', [$patient, $timeslot]) }}"
                deleteRoute="{{ route('patient.timeslot.destroy', [$patient, $timeslot]) }}">
                <p>Day: {{ $timeslot->day }}</p>
            </x-card>
        @endforeach
    </x-cardlist>

</x-layout>
