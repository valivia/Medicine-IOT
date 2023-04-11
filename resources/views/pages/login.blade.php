@extends('index')

@section('content')
    <div class="authWrapper">
        <main class="authMain">
            <h1>Welkom</h1>

            <form id="login" class="form">
                <section class="formSection">
                    <label for="email">Email</label>
                    <input placeholder="Email adres" type="text" id="email" name="email">
                </section>

                <section class="formSection">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input placeholder="Wachtwoord" type="text" id="wachtwoord" name="wachtwoord">
                </section>
            </form>

            <section class="authButtons">
                <a class="button" data-variant="secondary" href="/register">Registreer</a>
                <button class="button" data-variant="primary" type="submit">Log in</button>
            </section>

        </main>
    </div>
@endsection
