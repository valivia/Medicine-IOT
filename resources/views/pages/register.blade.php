@extends('index')

@section('content')
    <div class="authWrapper">
        <main class="authMain">

            <h1>ACCOUNT GEGEVENS</h1>

            <form action="/register" class="authForm" method="post">
                @method('POST')
                @csrf

                {{-- Part 1 --}}
                <div id="reg1" class="form authForm" style="display: flex;">
                    <section class="formSection">
                        <label for="email">Email adres</label>
                        <input placeholder="Email adres" type="text" id="email" name="email">
                    </section>

                    <section class="formSection">
                        <label for="wachtwoord">Wachtwoord</label>
                        <input placeholder="Wachtwoord123..." type="text" id="wachtwoord" name="password">
                    </section>

                    <section class="formSection">
                        <label for="wachtwoord_hh">Wachtwoord herhalen</label>
                        <input placeholder="wachtwoord123..." type="text" id="wachtwoord_hh" name="password_confirmation">
                    </section>

                    <section class="authButtons">
                        <a class="button" data-variant="secondary" href="/login">Terug</a>
                        <button class="button" data-variant="primary" type="button" onclick="toggle()">Volgende</button>
                    </section>
                </div>

                {{-- Part 2 --}}
                <div id="reg2" class="form authForm" style="display: none;">
                    <section class="formSection">
                        <label for="name">Naam</label>
                        <section class="formHorizontal">
                            <input placeholder="Voornaam" type="text" name="first_name" style="flex-grow: 1;">
                            <input placeholder="Achternaam" type="text" name="last_name" style="flex-grow: 3;">
                        </section>
                    </section>

                    <section class="formSection">
                        <label for="dob">Geboortedatum</label>
                        <input placeholder="14-7-1992" type="text" id="dob" name="dob">
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
