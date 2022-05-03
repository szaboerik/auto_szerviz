@include('layouts.belepve')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Adatszerkesztés</title>
</head>
<body>
    <main>
    <h2>Dolgozó módosítása</h2>
    <form action="/api/dolgozo/{{ $dolgozo->d_kod }}" method="POST">
      @csrf
      @method('put')
      <label for="d_kod">Dolgozó azonosító</label>
       <input type="number" id="d_kod" name="d_kod" value="{{ $dolgozo->d_kod }}" readonly><br>
        <label for="dolg_nev">Dolgozó neve</label>
        <input type="text" id="dolg_nev" name="dolg_nev" value="{{ $dolgozo->dolg_nev }}"><br>
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
  </div>
</article>
</main>
</body>
</html>