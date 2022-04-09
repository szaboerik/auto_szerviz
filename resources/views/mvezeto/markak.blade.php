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
            <h2>Márkák</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Márka</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($markas as $marka): ?>
        <tr>
          <th>{{ $marka->marka}}</th>
          <td style="display: flex;">
            <a href="/mvezeto/markamodosit/{{ $marka->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/marka/{{ $marka->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
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
    <div><a href="/mvezeto/marka"><button class="btn btn-sm btn-success">Új márka létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>