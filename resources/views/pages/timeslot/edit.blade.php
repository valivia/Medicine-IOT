<x-layout>

    <x-form title="Timeslot" route="{{ route('patient.timeslot.update', [$patient, $timeslot]) }}" method="PUT">

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

        <section class="formSection">
            <label for="medication_ids">Medications</label>
            <select name="medication_ids[]" multiple="multiple" id="medication_ids">
                @foreach ($medications as $medication)
                    <option value="{{ $medication->id }}"
                        {{ in_array($medication->id, old('medication_ids', $timeslot->medications->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $medication->name }}
                    </option>
                @endforeach
            </select>

            @error('medication_ids')
                <p class="error">{{ $message }}</p>
            @enderror
        </section>

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

    </x-form>

</x-layout>
