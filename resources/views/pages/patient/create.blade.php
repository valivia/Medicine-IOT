@extends('index')
@include('partials.nav')

@section('content')
    <form class="form" method="POST">
        <h2>Create Patient</h2>


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

    </form>
@endsection
