<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <h1>Welkom</h1>
    <h2>Log in</h2>
    <form id="login">
        <label for="email"></label>
        <input placeholder="Email adres" type="text" id="email" name="email">
        <label for="wachtwoord"></label>
        <input placeholder="Wachtwoord" type="text" id="wachtwoord" name="wachtwoord">
    </form>

    <section id="buttons">
        <button data-variant="secondary">Registreer</button>
        <button data-variant="primary">Log in</button>
    </section>
</body>

</html>