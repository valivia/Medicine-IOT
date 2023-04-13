<x-layout>

    <x-form title="Timeslot" route="{{ route('patient.timeslot.store', $patient) }}" method="PUT">
        @include('partials/input', [
            'min' => 0,
            'max' => 23,
            'name' => 'hour',
            'label' => 'Hour',
            'type' => 'number',
            'value' => old('hour') ?? $timeslot->hour,
            'required' => true,
        ])

        @include('partials/input', [
            'min' => 0,
            'max' => 59,
            'name' => 'minute',
            'label' => 'Minute',
            'type' => 'number',
            'value' => old('minute') ?? $timeslot->minute,
            'required' => true,
        ])

        @include('partials/input', [
            'min' => 1,
            'max' => 7,
            'name' => 'day',
            'label' => 'Day',
            'type' => 'number',
            'value' => old('day') ?? $timeslot->day,
            'required' => true,
        ])
    </x-form>

</x-layout>
