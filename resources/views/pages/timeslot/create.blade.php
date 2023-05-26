<x-layout>

    <x-form title="Timeslot" route="{{ route('patient.timeslot.store', $patient) }}" method="POST">

        @include('partials/input', [
            'min' => 0,
            'max' => 23,
            'name' => 'hour',
            'label' => 'Hour',
            'type' => 'number',
            'value' => old('hour') ?? (int) date('H'),
            'required' => true,
        ])

        @include('partials/input', [
            'min' => 0,
            'max' => 59,
            'name' => 'minute',
            'label' => 'Minute',
            'type' => 'number',
            'value' => old('minute') ?? (int) date('i'),
            'required' => true,
        ])

        @include('partials/input', [
            'min' => 1,
            'max' => 7,
            'name' => 'day',
            'label' => 'Day',
            'type' => 'number',
            'value' => old('day') ?? (int) date('N'),
            'required' => true,
        ])

        <select name="medication_ids[]" multiple="multiple">
            @foreach ($medications as $medication)
                <option value="{{ $medication->id }}"
                    {{ in_array($medication->id, old('medication_ids', [])) ? ' selected' : '' }}>
                    {{ $medication->name }}
                </option>
            @endforeach
        </select>

        @error('medication_ids')
            <p class="error">{{ $message }}</p>
        @enderror

    </x-form>

</x-layout>
