<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginstilus.css') }}" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Bejelentkezés</title>
</head>
<body>
    <div class="container">
        <div class="loginmezo">
            <div class="title"><span>Bejelentkezés</span></div>
            <form action="belepes" method="post">
            @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Felhasználónév" name="fhn" id="fhn" required>
                </div>
                <div class="row">
                     <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Jelszó" name="jsz" id="jsz" required>
                </div>
                @error('hiba')
                  <div class="alert alert-danger">{{ $errors->first('hiba') }}</div>
                  @enderror
                <div class="row button">
                    <input type="submit" value="Belépés" name="mehet">
                </div>
            </form>
        </div>
    </div>
</body>
</html>