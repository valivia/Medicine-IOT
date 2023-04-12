@extends('index')

@section('content')
    <div class="authWrapper">
        <main class="authMain">

            <h1>ACCOUNT GEGEVENS</h1>

            <form class="authForm" method="post">
                @method('POST')
                @csrf

                {{-- Part 1 --}}
                <div id="reg1" class="form authForm" style="display: flex;">
                    <section class="formSection">
                        <label for="email">Email adres</label>
                        <input placeholder="Email adres" type="text" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </section>

                    <section class="formSection">
                        <label for="password">Wachtwoord</label>
                        <input placeholder="Wachtwoord123..." type="password" id="password" name="password" value="{{old('password')}}">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </section>

                    <section class="formSection">
                        <label for="password_confirmation">Wachtwoord herhalen</label>
                        <input placeholder="wachtwoord123..." type="password" id="password_confirmation"
                            name="password_confirmation" value="{{old('password_confirmation')}}">
                        @error('password_confirmation')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </section>

                    <section class="authButtons">
                        <a class="button" data-variant="secondary" href="/login">Terug</a>
                        <button class="button" data-variant="primary" type="button" onclick="toggle()">Volgende</button>
                    </section>
                </div>

                {{-- Part 2 --}}
                <div id="reg2" class="form authForm" style="display: none;">
                    <label for="name">Naam</label>

                    <section class="formHorizontal">

                        <section class="formSection" style="flex-grow: 1;">
                            <input placeholder="Voornaam" type="text" name="first_name" value="{{old('first_name')}}">
                            @error('first_name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </section>

                        <section class="formSection" style="flex-grow: 3;">
                            <input placeholder="Achternaam" type="text" name="last_name" value="{{old('last_name')}}">
                            @error('last_name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </section>

                    </section>

                    <section class="formSection">
                        <label for="dob">Geboortedatum</label>
                        <input placeholder="14-7-1992" type="date" id="dob" name="dob"  value="{{old('dob')}}>
                        @error('dob')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </section>


                    <section class="authButtons">
                        <button class="button" data-variant="secondary" onclick="toggle()">Terug</button>
                        <button class="button" data-variant="primary" type="submit" onclick="">Registreer</button>
                    </section>
                </div>

            </form>

        </main>

        <script>
            function toggleVisibility(element, display = "flex") {
                element.style.display = element.style.display === "none" ? "flex" : "none";
            }

            function toggle() {
                toggleVisibility(document.getElementById("reg1"));
                toggleVisibility(document.getElementById("reg2"));
            }
        </script>
    </div>
@endsection
