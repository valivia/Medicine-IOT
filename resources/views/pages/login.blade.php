@extends('index')

@section('content')
    <div class="authWrapper">
        <main class="authMain">
            <h1>Welkom</h1>

            <form class="form" method="post">
                @method('POST')
                @csrf

                <section class="formSection">
                    <label for="email">Email</label>
                    <input placeholder="Email adres" type="text" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                </section>

                <section class="formSection">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input placeholder="Wachtwoord" type="password" id="wachtwoord" name="password" value="{{old('password')}}">
                    @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                </section>

                <section class="authButtons">
                    <a class="button" data-variant="secondary" href="/register">Registreer</a>
                    <button class="button" data-variant="primary" type="submit">Log in</button>
                </section>
            </form>


        </main>
    </div>
@endsection
