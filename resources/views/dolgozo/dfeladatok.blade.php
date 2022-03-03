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
     <?php foreach($feladats as $feladat): ?>
        <tr>
          <th>{{ $feladat->id}}</th>
          <td>{{ $feladat->m_szam }}</td>
          <td>{{ $feladat->jelleg }}</td>
          <td>{{ $feladat->szerelo }}</td>
          <td>{{ $feladat->munkaora }}</td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
  </table>
        </article>
    </main>
</div>
</body>
</html>