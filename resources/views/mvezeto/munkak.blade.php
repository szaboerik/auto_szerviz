<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Munkák</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Munkák
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="rendelesek">Rendelések</a>
            <a href="feladatok">Feladatok</a>
        </nav>
        <article class="item3">
            <h2>Munkák</h2>
            <table class="table">
    <thead>
      <tr>
        <th>ID</th>
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
     <?php foreach($szervizs as $szerviz): ?>
        <tr>
          <th>{{ $szerviz->id}}</th>
          <th>{{ $szerviz->m_szam}}</th>
          <td>{{ $szerviz->ugyfel_neve }}</td>
          <td>{{ $szerviz->ugyfel_telszama }}</td>
          <td>{{ $szerviz->rendszam }}</td>
          <td>{{ $szerviz->munka_kezdete }}</td>
          <td>{{ $szerviz->munka_vege }}</td>
          <td>{{ $szerviz->fizetendo }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/munkamodosit/{{ $szerviz->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/munkalap/{{ $szerviz->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <div><a href="/mvezeto/munkalap"><button class="btn btn-sm btn-success">Új munkalap létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>