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
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="beszerzesek">Beszerzések</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
        </nav>
        <article class="item3">
            <h2>Autók</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Rendszám</th>
        <th>Márka</th>
        <th>Forgalmi</th>
        <th>Évjárat</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($autos as $auto): ?>
        <tr>
          <th>{{ $auto->rendszam}}</th>
          <td>{{ $auto->marka->marka }}</td>
          <td>{{ $auto->forgalmi }}</td>
          <td>{{ $auto->evjarat }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/automodosit/{{ $auto->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/auto/{{ $auto->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
            <a href="/mvezeto/munkalap"><button class="btn btn-sm btn-success">Új munkalap hozzáadása</button></a>
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