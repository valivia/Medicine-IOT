@extends('index')

@section('content')
    <div class="authWrapper">
        <main class="authMain">

            <!-- 1 -->
            <section id="login" class="login_part">
                <h1>ACCOUNT GEGEVENS</h1>

                <form class="form authForm" style="display: flex;" id="reg1">
                    <section class="formSection">
                        <label for="email">Email adres</label>
                        <input placeholder="Email adres" type="text" id="email" name="email">
                    </section>

                    <section class="formSection">
                        <label for="wachtwoord">Wachtwoord</label>
                        <input placeholder="Wachtwoord123..." type="text" id="wachtwoord" name="wachtwoord">
                    </section>

                    <section class="formSection">
                        <label for="wachtwoord_hh">Wachtwoord herhalen</label>
                        <input placeholder="wachtwoord123..." type="text" id="wachtwoord_hh" name="wachtwoord_hh">
                    </section>

                </form>

                <form class="form authForm" style="display: none;" id="reg2">

                    <section class="formSection">
                        <label for="name">Naam</label>
                        <section class="formHorizontal">
                            <input placeholder="Voornaam" type="text" name="name" style="flex-grow: 1;">
                            <input placeholder="Achternaam" type="text" name="lastname" style="flex-grow: 3;">
                        </section>
                    </section>

                    <section class="formSection">
                        <label for="dob">Geboortedatum</label>
                        <input placeholder="14-7-1992" type="text" id="dob" name="dob">
                    </section>

                    <section class="formSection">
                        <label for="telefoon">Telefoonnummer</label>
                        <input placeholder="0612345678" type="text" id="telefoon" name="telefoon">
                    </section>

                </form>


                <section class="authButtons" style="display: flex;" id="buttons1">
                    <a class="button" data-variant="secondary" href="/login">Terug</a>
                    <button class="button" data-variant="primary" type="button" onclick="toggle()">Volgende</button>
                </section>

                <section class="authButtons" style="display: none;" id="buttons2">
                    <button class="button" data-variant="secondary" onclick="toggle()">Terug</button>
                    <button class="button" data-variant="primary" type="button" onclick="">registreer</button>
                </section>

            </section>

        </main>

        <script>
            function toggleVisibility(element, display = "flex") {
                element.style.display = element.style.display === "none" ? "flex" : "none";
            }

            function toggle() {
                toggleVisibility(document.getElementById("reg1"));
                toggleVisibility(document.getElementById("reg2"));
                toggleVisibility(document.getElementById("buttons1"));
                toggleVisibility(document.getElementById("buttons2"));
            }
        </script>
    </div>
@endsection
