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

                    <li class="nav-link">
                        <a href="rendelesek">
                            <i class='bx bx-cart-add icon' ></i>
                            <span class="text nav-text">Rendelések</span>
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
  <div style="width: 80%; margin: auto;">
    <form action="/api/munkalap/{{ $munkalap->m_szam }}" method="POST">
      @csrf
      @method('put')
        <label for="m_szam">Munkaszám</label>
        <input type="number" id="m_szam" name="m_szam" value="{{ $munkalap->m_szam }}" readonly><br>
        <label for="ugyfel_neve">Ügyfél neve</label>
        <input type="text" id="ugyfel_neve" name="ugyfel_neve" value="{{ $munkalap->ugyfel_neve }}"><br>
        <label for="ugyfel_telszama">Ügyfél telefonszáma</label>
        <input type="text" id="ugyfel_telszama" name="ugyfel_telszama" value="{{ $munkalap->ugyfel_telszama }}"><br>
        <label for="rendszam">Rendszám</label>
                <select name="rendszam" placeholder="ABC123">
                @foreach ($autos as $auto)
                <option value="{{ $auto->id }}" {{$auto->id == $munkalap->auto->id ? 'selected' : ''}}>{{ $auto->rendszam }} </option>
                @endforeach
                </select><br>
        <label for="munka_kezdete">Munka kezdete</label>
        <input type="date" id="munka_kezdete" name="munka_kezdete" value="{{ $munkalap->munka_kezdete }}" readonly><br>
        <label for="munka_vege">Munka vége</label>
        <input type="date" id="munka_vege" name="munka_vege" value="{{ $munkalap->munka_vege }}" readonly><br>
        <label for="fizetendo">Fizetendő</label>
        <input type="number" id="fizetendo" name="fizetendo" value="{{ $munkalap->fizetendo }}" readonly><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
</div>
</article>
</main>
</body>
</html>