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

<body class="main">
    <h1>Welkom</h1>

    <main class="login_part">

        <form id="login">
            <label for="email">Email</label>
            <input placeholder="Email adres" type="text" id="email" name="email">
            <label for="wachtwoord">Wachtwoord</label>
            <input placeholder="Wachtwoord" type="text" id="wachtwoord" name="wachtwoord">

            
        </form>
        
        <section class="buttons">
            <a class="button" data-variant="secondary" href="/register">Registreer</a>
            <button class="button" data-variant="primary" type="submit">Log in</button>
        </section>

    </main>
</body>

</html>