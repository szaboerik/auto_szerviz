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
            <aside class="sidebar">
            <header>
                <div class="image-text">
                        <span class="image" >
                        <!--<img src="{{ asset('css/logo.png') }}" alt="logo">
                            --></span>
                  
            <div class="text header-text">
                        <span class="name">Racse Autószerelő Műhely</span>

                </div>

                </div>
                <i class='bx bxs-chevron-right toggle'></i>
            </hearder>
                <div class="menubar">
                <div class="menu">
                     
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="alkatreszek">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">Alkatrészek</span>
                        </a>
                    </li>
                        
                    <li class="nav-link">
                        <a href="autok">
                            <i class='bx bxs-car-mechanic icon' ></i>
                            <span class="text nav-text">Autók</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="beszallitok">
                            <i class='bx bx-package icon' ></i>
                            <span class="text nav-text">Beszállítók</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="beszerzesek">
                            <i class='bx bx-cart-add icon' ></i>
                            <span class="text nav-text">Beszerzések</span>
                         </a>
                    </li> 

                    <li class="nav-link">
                        <a href="dolgozok">
                            <i class='bx bx-face icon'></i>
                            <span class="text nav-text">Dolgozók</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="feladatok">
                            <i class='bx bx-task icon' ></i>
                            <span class="text nav-text">Feladatok</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="jellegek">
                            <i class='bx bxs-wrench icon'></i>
                            <span class="text nav-text">Munka jellege</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="markak">
                            <i class='bx bx-car icon'></i>
                            <span class="text nav-text">Márkák</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="munkak">
                            <i class='bx bx-detail icon'></i>
                            <span class="text nav-text">Munkalapok</span>
                        </a>
                    </li>

                                                    
                </ul>
                </div>

                <div class="bottom-content">
                        <li>
                            <a href="/kilepes">
                            <i class='bx bx-log-out icon' ></i>
                                <span class="text nav-text">Kijelentkezés</span>
                            </a>
                        </li>  

                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon' ></i>
                        <i class='bx bx-sun icon sun' ></i>
                        <span class="mode-text text">Sötét téma</span>
                      
                    </div>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>       
                
                </div>   
            </div>
        </aside>
        <article class="item3">
            <h2>Munkák</h2>
            <table class="table">
    <thead>
      <tr>
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
     <?php foreach($munkalaps as $munkalap): ?>
        <tr>
          <th>{{ $munkalap->m_szam}}</th>
          <td>{{ $munkalap->ugyfel_neve }}</td>
          <td>{{ $munkalap->ugyfel_telszama }}</td>
          <td>{{ $munkalap->auto->rendszam }}</td>
          <td>{{ $munkalap->munka_kezdete }}</td>
          <td>{{ $munkalap->munka_vege }}</td>
          <td>{{ $munkalap->fizetendo }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/munkamodosit/{{ $munkalap->m_szam }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/munkalap/{{ $munkalap->m_szam }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
            <a href="/mvezeto/feladat"><button class="btn btn-sm btn-success">Új feladat hozzáadása</button></a>
            <button onclick="munkabefejezes()">Feladat befejezése</button>
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
<?php
function munkabefejezes($id)
{
    $munkalap = Munkalap::find($id);
    $munkalap -> munka_vege = now();
    $munkalap->save();

    return redirect('/mvezeto/munkak');
}
?>