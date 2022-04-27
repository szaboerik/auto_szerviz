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
            <h2>Feladat felvitele</h2>
            <form action="/api/feladat" method="POST">
                @csrf
                  <label for="m_szam">Munkaszám</label>
                  <select name="m_szam" autocomplete="off"> <!--ha firefox-al van megnyitva az alkalmazás, kell az aut.compl=off;chrome nem igényli-->
                @foreach ($munkalaps as $munkalap)
                <option value="{{ $munkalap->m_szam }}" {{$munkalap->m_szam==request()->get('m_szam') ? "selected" : "" }} >{{$munkalap->m_szam }}</option>
                @endforeach
                </select><br>
                @error('befejezettmunkalap')
                  <div class="alert alert-danger">{{ $errors->first('befejezettmunkalap') }}</div> 
                  @enderror
                  @error('mszam')
                  <div class="alert alert-danger">{{ $errors->first('mszam') }}</div> 
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
                  @error('jell')
                  <div class="alert alert-danger">{{ $errors->first('jell') }}</div>
                  @enderror
                <label for="d_kod">Dolgozó</label>
                <select name="d_kod">
                @foreach ($dolgozos as $dolgozo)
                <option value="{{ $dolgozo->d_kod }}">{{ $dolgozo->dolg_nev }}</option>
                @endforeach
                </select><br>
                @error('szerelo')
                  <div class="alert alert-danger">{{ $errors->first('szerelo') }}</div>
                  @enderror
                  @error('szer')
                  <div class="alert alert-danger">{{ $errors->first('szer') }}</div>
                  @enderror
                  <label for="munkaora">Munkaóra</label>
                  <input type="number" id="munkaora" name="munkaora" value="{{ old('munkaora') }}"><br>
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
                  <label for="created_at">Feladat felvitele</label>
                  <input type="date" id="created_at" name="created_at" readonly><br>
                  <label for="f_osszege">Feladat összege</label>
                  <input type="number" id="f_osszege" name="f_osszege" readonly><br>
                  <label for="besz_osszege">Beszerzés összege</label>
                  <input type="number" id="besz_osszege" name="besz_osszege" readonly><br>
                  <button type="submit" class="btn btn-success">Mentés</button>
                  <a href="/mvezeto/feladatok" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>