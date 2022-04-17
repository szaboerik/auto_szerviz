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
            <h2>Dolgozók</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Dolgozó azonosító</th>
        <th>Dolgozó neve</th>
        <th>Képesség</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($dolgozos as $dolgozo): ?>
        <tr>
          <th>{{ $dolgozo->d_kod}}</th>
          <td>{{ $dolgozo->dolg_nev }}</td>
          <td>{{ $dolgozo->kepesseg }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/dolgozomodosit/{{ $dolgozo->d_kod }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/dolgozo/{{ $dolgozo->d_kod }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
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
    <div><a href="/mvezeto/dolgozo"><button class="btn btn-sm btn-success">Új dolgozó létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>