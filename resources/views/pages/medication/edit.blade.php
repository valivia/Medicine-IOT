<x-layout>

    <x-form title="Medication" route="{{ route('patient.medication.update', [$patient, $medication]) }}" method="PUT">
        @include('partials/input', [
            'name' => 'name',
            'label' => 'Name',
            'placeholder' => 'Paracetamol',
            'value' => old('name') ?? $medication->name,
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'description',
            'label' => 'Description',
            'placeholder' => 'Description',
            'value' => old('description') ?? $medication->description,
            'required' => false,
        ])
    </x-form>

</x-layout>
