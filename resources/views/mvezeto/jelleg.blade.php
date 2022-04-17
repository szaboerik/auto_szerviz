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
            <h2>Jelleg felvitele</h2>
            <form action="/api/jelleg" method="POST">
                @csrf
                  <label for="elnevezes">Elnevezés</label>
                  <input type="text" id="elnevezes" name="elnevezes" value="{{ old('elnevezes') }}"><br>
                  @error('elnevezes')
                  <div class="alert alert-danger">{{ $errors->first('elnevezes') }}</div>
                  
                  @enderror
                  @error('elnevdup')
                  <div class="alert alert-danger">{{ $errors->first('elnevdup') }}</div>
                  
                  @enderror
                  <label for="oradij">Óradíj</label>
                  <input type="number" id="oradij" name="oradij" value="{{ old('oradij') }}"><br>
                  @error('oradij')
                  <div class="alert alert-danger">{{ $errors->first('oradij') }}</div>
                  <!-- <div class="alert alert-danger">{{ $message}}</div> --> <!--Ugyanazt az eredményt hozza mint a {{ $errors->first('oradij') }} --> 
                  @enderror
                  @error('jelleg')
                  <div class="alert alert-danger">{{ $errors->first('jelleg') }}</div>
                 
                  @enderror
                  <button type="submit" class="btn btn-success">Mentés</button>

                  <a href="/mvezeto/jellegek"  type=button class="button">Mégse</a>
                  
              </form> 
        </article>
    </main>
</div>
</body>
</html>