<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Feladatok</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Feladatok
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
            <h2>Feladatok</h2>
            <table class="table">
    <thead>
      <tr>
        
        <th>ID</th>
        <th>Munkaszám</th>
        <th>Jelleg</th>
        <th>Szerelő</th>
        <th>Munkaóra</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($szervizs as $szerviz): ?>
        <tr>
          <th>{{ $szerviz->id}}</th>
          <td>{{ $szerviz->m_szam }}</td>
          <td>{{ $szerviz->jelleg }}</td>
          <td>{{ $szerviz->szerelo }}</td>
          <td>{{ $szerviz->munkaora }}</td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
  </table>
        </article>
    </main>
</div>
</body>
</html>