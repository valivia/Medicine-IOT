<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="login">
        <label for="firstname">First Name</label>
        <input placeholder="First Name" type="text" id="firstname" name="firstname">
        
        <label for="lastname">Last Name</label>
        <input placeholder="Last Name" type="text" id="lastname" name="lastname">

        <label for="birthday">Birthday</label>
        <input placeholder="Birthday" type="text" id="birthday" name="birthday">

        <label for="address">Address</label>
        <input placeholder="Address" type="text" id="address" name="address">

        
    </form>

    <section class="buttons">
        <a class="button" data-variant="secondary" href="/register">Back</a>
        <button class="button" data-variant="primary" type="submit">Submit</button>
    </section>
</body>
</html>