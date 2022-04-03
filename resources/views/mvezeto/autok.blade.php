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
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="beszerzesek">Beszerzések</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
        </nav>
        <article class="item3">
            <h2>Autók</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Rendszám</th>
        <th>Márka</th>
        <th>Forgalmi</th>
        <th>Évjárat</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($autos as $auto): ?>
        <tr>
          <th>{{ $auto->rendszam}}</th>
          <td>{{ $auto->marka->marka }}</td>
          <td>{{ $auto->forgalmi }}</td>
          <td>{{ $auto->evjarat }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/automodosit/{{ $auto->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/auto/{{ $auto->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
            <a href="/mvezeto/munkalap"><button class="btn btn-sm btn-success">Új munkalap hozzáadása</button></a>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <div><a href="/mvezeto/auto"><button class="btn btn-sm btn-success">Új autó létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>