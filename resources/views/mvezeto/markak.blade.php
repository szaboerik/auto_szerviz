<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Márkák</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
        Márkák
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="munkak">Munkalapok</a>
            <a href="rendelesek">Rendelések</a>
        </nav>
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
    </tbody>
    <div><a href="/mvezeto/marka"><button class="btn btn-sm btn-success">Új márka létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>