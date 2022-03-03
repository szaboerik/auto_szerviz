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
            <a href="belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="munkalap">Munkalap</a>
            <a href="rendeles">Rendelés</a>
            <a href="feladatok">Feladatok</a>
        </nav>
        <article class="item3">
            <h2>Munkák</h2>
            <table class="mtabla">
                <thead>
                <tr>
                    <th>Munkaszám</th>
                    <th>Ügyfél neve</th>
                    <th>Ügyfél telefonszáma</th>
                    <th>Rendszám</th>
                    <th>Autó érkezése</th>
                    <th>Munka kezdete</th>
                    <th>Munka vége</th>
                    <th>Autó távozása</th>
                    <th>Fizetendő összeg</th>
                    <th><input type="submit" value="Módosítás"></th>
                    <th><input type="submit" value="Törlés"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($szervizek as $szerviz): ?>
            
                <tr>
                    <th>{{ $szerviz->id }}</th>

                    <td>{{$szerviz->munkaszam}}</td>
                    <td>{{$szerviz->ugyfel_nev}}</td>
                    <td>{{$szerviz->ugyfel_telefonszam}}</td>
                    <td>{{$szerviz->rendszam}}</td>
                    <td>{{$szerviz->auto_erkezese}}</td>
                    <td>{{$szerviz->munka_kezdete}}</td>
                    <td>{{$szerviz->munka_vege}}</td>
                    <td>{{$szerviz->auto_tavozasa}}</td>
                    <td>{{$szerviz->fizetendo_osszeg}}</td>
                    <td><a href="/mvezeto/munkalap/{{ $szerviz->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/mvezeto/munkak{{ $szerviz->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a></td>
                </tr>
            <?php endforeach; ?>
                </tbody>
                <div><a href="mvezeto/munkalap"><button class="btn btn-sm btn-success">Új munkalap létrehozása</button></a></div>
            </table>
        </article>
        
    </main>
</div>
</body>
</html>