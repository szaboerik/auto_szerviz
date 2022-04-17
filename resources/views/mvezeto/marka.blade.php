@include('layouts.belepve')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Adatfelvitel</title>
</head>
<body>
    <main>
    <div class="grid-container">
    @include('layouts.oldalmenu')
        <article class="item3">
            <h2>Márka felvitele</h2>
            <form action="/api/marka" method="POST">
                @csrf
                  <label for="marka">Márka</label>
                  <input type="text" id="marka" name="marka"><br>
                  @error('marka')
                  <div class="alert alert-danger">{{ $errors->first('marka') }}</div>
                  <!-- <div class="alert alert-danger">{{ $message}}</div> --> <!--Ugyanazt az eredményt hozza mint a {{ $errors->first('oradij') }} --> 
                  @enderror
                  @error('markadup')
                  <div class="alert alert-danger">{{ $errors->first('markadup') }}</div>
                  <!-- <div class="alert alert-danger">{{ $message}}</div> --> <!--Ugyanazt az eredményt hozza mint a {{ $errors->first('oradij') }} --> 
                  @enderror
                  <button type="submit" class="btn btn-success">Mentés</button>
                  <a href="/mvezeto/markak" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>