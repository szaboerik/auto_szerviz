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
            <h2>Dolgozó felvitele</h2>
            <form action="/api/dolgozo" method="POST">
                @csrf
                  <label for="dolg_nev">Dolgozó neve</label>
                  <input type="text" id="dolg_nev" name="dolg_nev"><br>
                  @error('dolgozo')
                  <div class="alert alert-danger">{{ $errors->first('dolgozo') }}</div>
                  @enderror
                    <label for="kepesseg">Képesség</label>
                    <select name="kepesseg">
                  <option value="s">szerelő</option>
                  <option value="v">vezető</option>
                    </select>
                    @error('vezeto')
                  <div class="alert alert-danger">{{ $errors->first('vezeto') }}</div>
                  @enderror
                  <button type="submit" class="btn btn-success">Mentés</button>
                  <a href="/mvezeto/dolgozok" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>