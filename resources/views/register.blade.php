<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
    <title>Laravel</title>
    <script src="js/register.js" charset="utf-8" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main">

        <!-- 1 -->
        <section id="login" class="login_part">
            <h1>ACCOUNT GEGEVENS</h1>

            <form>
                <label for="email">Email adres</label>
                <input placeholder="Email adres" type="text" id="email" name="email">

                <label for="wachtwoord">Wachtwoord</label>
                <input placeholder="Wachtwoord123..." type="text" id="wachtwoord" name="wachtwoord">

                <label for="wachtwoord_hh">Wachtwoord herhalen</label>
                <input placeholder="wachtwoord123..." type="text" id="wachtwoord_hh" name="wachtwoord_hh">

                
            </form>
            <section class="buttons">
                <a class="button" data-variant="secondary" href="/login">Terug</a>
                <button class="button" data-variant="primary" type="button" onclick="next()">Volgende</button>
            </section>
            
        </section>

        <!-- 2 -->
        <section id="login2" class="login_part" style="display: none;">
            <h1>PERSOONS GEGEVENS</h1>

            <form>
                <label for="name">Naam</label>

                <section class="name">
                    <input placeholder="Voornaam" type="text" name="name">
                    <input placeholder="Achternaam" type="text" name="lastname">
                </section>

                <label for="dob">Geboortedatum</label>
                <input placeholder="14-7-1992" type="text" id="dob" name="dob">

                <label for="telefoon">Telefoonnummer</label>
                <input placeholder="0612345678" type="text" id="telefoon" name="telefoon">

            </form>
            
            <section class="buttons">
                <button class="button" data-variant="secondary" type="button" onclick="back()">Terug</button>
                <button class="button" data-variant="primary" type="submit">Registreer</button>
            </section>

        </section>


    </main>
</body>

</html>