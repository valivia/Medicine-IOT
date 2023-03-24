<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
    <title>Laravel</title>
    <script src="js/main.js" charset="utf-8" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main">
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

        <section id="buttons">
            <button data-variant="secondary">Terug</button>
            <button onclick="next()" data-variant="primary">Volgende</button>
        </section>
    </section>

    <section id="login2" class="login_part">
        <h1>PERSOONS GEGEVENS</h1>
        <form>

            <label for="name">Naam</label>
            <input placeholder="Voornaam" type="text" id="name" name="name">
            <input placeholder="Achternaam" type="text" id="name" name="lastname">

            <label for="dob">Geboortedatum</label>
            <input placeholder="14-7-1992" type="text" id="dob" name="dob">

            <label for="telefoon">Telefoonnummer</label>
            <input placeholder="0612345678" type="text" id="telefoon" name="telefoon">
        </form>

        <section id="buttons">
            <button onclick="back()" data-variant="secondary">Terug</button>
            <button data-variant="primary">Registreer</button>
        </section>

    </section>


    </main>
</body>

</html>