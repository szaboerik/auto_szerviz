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
    <h2>Jelleg módosítása</h2>
            <form action="/api/jelleg/{{ $jelleg->jelleg }}" method="POST">
                @csrf
                @method('put')
                  <label for="jelleg">Jelleg</label>
                  <input type="text" id="jelleg" name="jelleg" value="{{ $jelleg->jelleg }}" readonly><br>
                  <label for="elnevezes">Elnevezés</label>
                  <input type="text" id="elnevezes" name="elnevezes" value="{{ $jelleg->elnevezes }}"><br>
                  @error('elnevezes')
                  <div class="alert alert-danger">{{ $errors->first('elnevezes') }}</div>
                  @enderror
                  @error('elnevdup')
                  <div class="alert alert-danger">{{ $errors->first('elnevdup') }}</div>
                  @enderror
                  <label for="oradij">Óradíj</label>
                  <input type="number" id="oradij" name="oradij" value="{{ $jelleg->oradij }}"><br>
                  @error('oradij')
                  <div class="alert alert-danger">{{ $errors->first('oradij') }}</div>
                  @enderror
                  @error('jelleg')
                  <div class="alert alert-danger">{{ $errors->first('jelleg') }}</div>
                    @enderror
                  <button type="submit" class="btn btn-success">Mentés</button>
                  <a href="/mvezeto/jellegek" class="button">Mégse</a>
              </form> 
              </div>
        </article>
    </main>
</body>
</html>