<?php
function check(){
    if(isset($_SESSION["belepve"])){ return true;}
    else {return false;}
}
session_start();
if(!check()){
    header("Location:../belepes");
    exit();
}
?>
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
            <h2>Munkák</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Munkaszám</th>
        <th>Ügyfél neve</th>
        <th>Ügyfél telefonszáma</th>
        <th>Rendszám</th>
        <th>Munka kezdete</th>
        <th>Munka vége</th>
        <th>Fizetendő</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($munkalaps as $munkalap): ?>
        <tr>
          <th>{{ $munkalap->m_szam}}</th>
          <td>{{ $munkalap->ugyfel_neve }}</td>
          <td>{{ $munkalap->ugyfel_telszama }}</td>
          <td>{{ $munkalap->auto->rendszam }}</td>
          <td>{{ $munkalap->munka_kezdete }}</td>
          <td>{{ $munkalap->munka_vege }}</td>
          <td>{{ $munkalap->fizetendo }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/munkamodosit/{{ $munkalap->m_szam }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/munkalap/{{ $munkalap->m_szam }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
            <a href="/mvezeto/feladat"><button class="btn btn-sm btn-success">Új feladat hozzáadása</button></a>
            
          </td>
        </tr>
        <?php endforeach; ?>
        @if (\Session::has('error'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
    </tbody>
    <div><a href="/mvezeto/munkalap"><button class="btn btn-sm btn-success">Új munkalap létrehozása</button></a></div>
  </table>
  
        </article>
        
    </main>
</div>
</body>
</html>