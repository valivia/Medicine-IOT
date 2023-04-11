@extends('index')
@include('partials.nav')

@section('content')
    <form class="form" method="POST">
        <h2>Create Patient</h2>

        <section class="formSection">
            <label for="firstname">First Name</label>
            <input placeholder="First Name" type="text" id="firstname" name="firstname">
        </section>

        <section class="formSection">
            <label for="lastname">Last Name</label>
            <input placeholder="Last Name" type="text" id="lastname" name="lastname">
        </section>

        <section class="formSection">
            <label for="birthday">Birthday</label>
            <input placeholder="Birthday" type="text" id="birthday" name="birthday">
        </section>

        <section class="formSection">
            <label for="address">Address</label>
            <input placeholder="Address" type="text" id="address" name="address">
        </section>
    </form>
@endsection
