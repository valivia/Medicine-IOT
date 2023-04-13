@extends('index')

@section('content')
    <div class="authWrapper">
        <h1>Register</h1>

        <form class="form" method="post">
            @method('POST')
            @csrf

            {{-- Part 1 --}}
            <div id="reg1" class="form authForm" style="display: flex;">

                @include('partials/input', [
                    'name' => 'email',
                    'label' => 'Email',
                    'placeholder' => 'E.g. John@gmail.com',
                    'value' => old('email'),
                    'required' => true,
                ])


                @include('partials/input', [
                    'name' => 'password',
                    'label' => 'password',
                    'placeholder' => 'E.g. HKJFhs7fs&*',
                    'value' => old('password'),
                    'required' => true,
                ])


                @include('partials/input', [
                    'name' => 'password_confirmation',
                    'label' => 'repeat password',
                    'placeholder' => 'E.g. HKJFhs7fs&*',
                    'value' => old('password_confirmation'),
                    'required' => true,
                ])


                <section class="authButtons">
                    <a class="button" data-variant="secondary" href="/login">Back</a>
                    <button class="button" data-variant="primary" type="button" onclick="toggle()">Next</button>
                </section>
            </div>

            {{-- Part 2 --}}
            <div id="reg2" class="form authForm" style="display: none;">

                <section class="formHorizontal">

                    @include('partials/input', [
                        'name' => 'first_name',
                        'label' => 'First name',
                        'placeholder' => 'E.g. John',
                        'value' => old('first_name'),
                        'required' => true,
                    ])


                    @include('partials/input', [
                        'name' => 'last_name',
                        'label' => 'Last name',
                        'placeholder' => 'E.g. Doe',
                        'value' => old('last_name'),
                        'required' => true,
                    ])

                </section>


                @include('partials/input', [
                    'name' => 'dob',
                    'label' => 'Date of birth',
                    'type' => 'date',
                    'placeholder' => 'E.g. 14-7-1992',
                    'value' => old('dob'),
                    'required' => true,
                ])

                <section class="authButtons">
                    <button class="button" data-variant="secondary" onclick="toggle()">Back</button>
                    <button class="button" data-variant="primary" type="submit" onclick="">Registrer</button>
                </section>
            </div>

        </form>
    </div>

    <script>
        function toggleVisibility(element, display = "flex") {
            element.style.display = element.style.display === "none" ? "flex" : "none";
        }

        function toggle() {
            toggleVisibility(document.getElementById("reg1"));
            toggleVisibility(document.getElementById("reg2"));
        }
    </script>
@endsection
