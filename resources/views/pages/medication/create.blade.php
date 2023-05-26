<x-layout>

    <x-form title="Medication" route="{{ route('patient.medication.store', $patient) }}" method="POST">

        @include('partials/input', [
            'name' => 'name',
            'label' => 'Name',
            'placeholder' => 'Paracetamol',
            'value' => old('name'),
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'description',
            'label' => 'Description',
            'placeholder' => 'Description',
            'value' => old('description'),
            'required' => false,
        ])

    </x-form>

</x-layout>
