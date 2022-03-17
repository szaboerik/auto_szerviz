<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Autók</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
        Autók
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="rendelesek">Rendelések</a>
            <a href="munkak">Munkák</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
        </nav>
        <article class="item3">
            <h2>Autók</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Rendszám</th>
        <th>MárkaID</th>
        <th>Forgalmi</th>
        <th>Évjárat</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($autos as $auto): ?>
        <tr>
          <th>{{ $auto->rendszam}}</th>
          <td>{{ $auto->markaId }}</td>
          <td>{{ $auto->forgalmi }}</td>
          <td>{{ $auto->evjarat }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/automodosit/{{ $auto->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/auto/{{ $auto->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
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