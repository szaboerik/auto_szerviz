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
                            <a href="/belepes">
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
            <h2>Feladat felvitele</h2>
            <form action="/api/feladat" method="POST">
                @csrf
                  <label for="f_szam">Feladatszám</label>
                  <input type="number" id="f_szam" name="f_szam" readonly><br>
                  <label for="m_szam">Munkaszám</label>
                <select name="m_szam">
                @foreach ($munkalaps as $munkalap)
                <option value="{{ $munkalap->m_szam }}">{{ $munkalap->m_szam }}</option>
                @endforeach
                </select><br>
                <label for="jelleg">Jelleg</label> 
                <select name="jelleg">
                @foreach ($jellegs as $jelleg)
                <option value="{{ $jelleg->jelleg }}">{{ $jelleg->elnevezes }}</option>
                @endforeach
                </select><br>
                <label for="d_kod">Dolgozó</label>
                <select name="d_kod">
                @foreach ($dolgozos as $dolgozo)
                <option value="{{ $dolgozo->d_kod }}">{{ $dolgozo->dolg_nev }}</option>
                @endforeach
                </select><br>
                  <label for="munkaora">Munkaóra</label>
                  <input type="number" id="munkaora" name="munkaora"><br>
                  <label for="f_osszege">Feladat összege</label>
                  <input type="number" id="f_osszege" name="f_osszege" readonly><br>
                  <label for="besz_osszege">Beszerzés összege</label>
                  <input type="number" id="besz_osszege" name="besz_osszege" readonly><br>
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
                  <a href="{{url()->previous()}}" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>