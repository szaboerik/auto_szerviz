<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Bejelentkezés</title>
</head>
<body>
    <form action="belepes" method="post">
    @csrf
    <div class="bejelentkezes">
    <form class="bejel">
    <label for="fhn"><b>Felhasználónév:</b></label>
        <input type="text" name="fhn" id="fhn" placeholder="Írd be a felhasználóneved"><br>
    <label for="jsz"><b>Jelszó:</b></label>
        <input type="password" placeholder="Írd be a jelszabad" name="jsz" id="jsz" > <br>
    <input type="submit" value="Bejelentkezés" name="mehet"><br>
      </form>
    </div>
</form>
</body>
</html>