@extends('index')
@include('partials.nav')

@section('content')
    <form class="form" method="PUT">
        @method('PUT')
        @csrf

        <h2>Create Patient</h2>

        {{-- First name --}}
        <section class="formSection">
            <label for="first_name">First Name</label>
            <input placeholder="First Name" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                required>
            @error('first_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </section>

        {{-- Last name --}}
        <section class="formSection">
            <label for="last_name">Last Name</label>
            <input placeholder="Last Name" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                required>
            @error('last_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </section>

        {{-- Birthday --}}
        <section class="formSection">
            <label for="birthday">Birthday</label>
            <input placeholder="Birthday" type="date" id="birthday" name="birthday" value="{{ old('birthday') }}"
                required>
            @error('birthday')
                <p class="error">{{ $message }}</p>
            @enderror
        </section>

        {{-- Address --}}
        <section class="formSection">
            <label for="address">Address</label>
            <input placeholder="Address" type="text" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
                <p class="error">{{ $message }}</p>
            @enderror
        </section>

        <section class="authButtons">
            <a class="button" data-variant="secondary" href='/patient'>Back</a>
            <button class="button" data-variant="primary" type="submit">Add Patient</button>
        </section>

    </form>
@endsection
