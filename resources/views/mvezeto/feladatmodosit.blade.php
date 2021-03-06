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
    <h2>Feladat módosítása</h2>
    <form action="/api/feladat/{{ $feladat->f_szam }}" method="POST">
      @csrf
      @method('put')
        <label for="m_szam">Munkaszám</label>
                <select name="m_szam">
                @foreach ($munkalaps as $munkalap)
                <option value="{{ $munkalap->m_szam }}" {{$munkalap->m_szam == $feladat->m_szam ? 'selected' : 'disabled'}}>{{ $munkalap->m_szam }}</option>
                @endforeach
                </select><br>
                @error('befejezettmunkalap')
                  <div class="alert alert-danger">{{ $errors->first('befejezettmunkalap') }}</div> 
                  @enderror
                <label for="jelleg">Jelleg</label>
                <select name="jelleg">
                @foreach ($jellegs as $jelleg)
                <option value="{{ $jelleg->jelleg }}">{{ $jelleg->elnevezes }}</option>
                @endforeach
                </select><br>
                @error('jelleg')
                  <div class="alert alert-danger">{{ $errors->first('jelleg') }}</div>
                  @enderror
                <label for="d_kod">Szerelő</label>
                <select name="d_kod">
                @foreach ($dolgozos as $dolgozo)
                <option value="{{ $dolgozo->d_kod }}">{{ $dolgozo->dolg_nev }}</option>
                @endforeach
                </select><br>
                @error('szerelo')
                  <div class="alert alert-danger">{{ $errors->first('szerelo') }}</div>
                  @enderror
                <label for="munkaora">Munkaóra</label>
                <input type="number" id="munkaora" name="munkaora" value="{{ $feladat->munkaora }}"><br>
                @error('munkaoranotnull')
                  <div class="alert alert-danger">{{ $errors->first('munkaoranotnull') }}</div>
                  @enderror
                  @error('szerelomaxmunkora')
                  <div class="alert alert-danger">{{ $errors->first('szerelomaxmunkora') }}</div>
                  @enderror
                  @error('szerelominmunkaora')
                  <div class="alert alert-danger">{{ $errors->first('szerelominmunkaora') }}</div>
                  @enderror
                  @error('feladatmaxoraszam')
                  <div class="alert alert-danger">{{ $errors->first('feladatmaxoraszam') }}</div>
                  @enderror
      <button type="submit" class="btn btn-success">Mentés</button>
      <a href="/mvezeto/feladatok" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>