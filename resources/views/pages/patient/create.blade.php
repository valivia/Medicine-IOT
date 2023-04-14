<x-layout>

    <x-form title="Patient" route="{{ route('patient.store') }}" method="POST">
        @include('partials/input', [
            'name' => 'first_name',
            'label' => 'First Name',
            'placeholder' => 'E.g. John',
            'value' => old('first_name'),
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'last_name',
            'label' => 'Last Name',
            'placeholder' => 'E.g. Doe',
            'value' => old('last_name'),
            'required' => true,
        ])


        @include('partials/input', [
            'name' => 'birthday',
            'label' => 'Birthday',
            'type' => 'date',
            'placeholder' => 'E.g. 01-01-2000',
            'value' => old('birthday'),
            'required' => true,
        ])


        @include('partials/input', [
            'name' => 'address',
            'label' => 'Address',
            'placeholder' => 'E.g. 1234 Street',
            'value' => old('address'),
            'required' => true,
        ])

        @include('partials/input', [
            'name' => 'device_id',
            'label' => 'Device ID',
            'placeholder' => 'E.g. 123456789',
            'value' => old('device_id'),
            'required' => true,
        ])
    </x-form>

</x-layout>
