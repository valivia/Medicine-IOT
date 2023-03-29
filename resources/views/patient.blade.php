<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/patient.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
        <title>Laravel</title>
    </head>
<body>
    <h1> Patienten </h1>
    <section class="patients">
        @include("_card")
    </section>

    <section class="buttons">
    <button class="button" data-variant="secondary" type="button">Nieuw</button>
    </section>

</body>
</html>
