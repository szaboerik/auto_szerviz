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
            <h2>Beszerzések</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Beszerzés azonosító</th>
        <th>Feladatszám</th>
        <th>Alkatrész</th>
        <th>Beszállító kód</th>
        <th>Egységár (Ft)</th>
        <th>Mennyiség (Db)</th>
        <th>Beszerzés összege (Ft)</th>
        
      </tr>
    </thead>
    <tbody>
     <?php foreach($beszerzess as $beszerzes): ?>
        <tr>
          <th>{{ $beszerzes->besz_azon}}</th>
          <td>{{ $beszerzes->f_szam }}</td>
          <td>{{ $beszerzes->alk->alk_neve }}</td>
          <td>{{ $beszerzes->besz->nev }}</td>
          <td>{{ $beszerzes->egyseg_ar }}</td>
          <td>{{ $beszerzes->mennyiseg }}</td>
          <td>{{ $beszerzes->besz_osszege }}</td>
          
          <td style="display: flex;">
            <a href="/mvezeto/beszerzesmodosit/{{ $beszerzes->besz_azon }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/beszerzes/{{ $beszerzes->besz_azon }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <div><a href="/mvezeto/beszerzes"><button class="btn btn-sm btn-success">Új beszerzés létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>