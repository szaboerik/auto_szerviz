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
            <h2>Feladatok</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Feladatszám</th>
        <th>Munkaszám</th>
        <th>Jelleg</th>
        <th>Szerelő</th>
        <th>Munkaóra</th>
        <th>Feladat felvitele</th>
        <th>Feladat összege (Ft)</th>
        <th>Beszerzés összege (Ft)</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($feladats as $feladat): ?>
        <tr>
          <th>{{ $feladat->f_szam}}</th>
          <td>{{ $feladat->m_szam }}</td>
          <td>{{ $feladat->jell->elnevezes }}</td>
          <td>{{ $feladat->dolg->dolg_nev }}</td>
          <td>{{ $feladat->munkaora }}</td>
          <td>{{ $feladat->created_at->toDateString();}}</td>
          <td>{{ $feladat->f_osszege }}</td>
          <td>{{ $feladat->besz_osszege }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/feladatmodosit/{{ $feladat->f_szam }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/feladat/{{ $feladat->f_szam }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
            <a href="/mvezeto/beszerzes"><button class="btn btn-sm btn-success">Új beszerzés hozzáadása</button></a>
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
    <div><a href="/mvezeto/feladat"><button class="btn btn-sm btn-success">Új feladat létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>