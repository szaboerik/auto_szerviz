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
<body>

        <article class="item3">
            <h2>Beszerzés felvétele</h2>
            <form action="/api/beszerzes" method="POST">
                @csrf
                <label for="besz_azon">Beszerzés azonosító</label>
                <input type="number" id="besz_azon" name="besz_azon" readonly><br>
                <label for="f_szam">Feladatszám</label>
                <select name="f_szam">
                @foreach ($feladats as $feladat)
                <option value="{{ $feladat->f_szam }}">{{ $feladat->f_szam }}</option>
                @endforeach
                </select><br>
                <label for="alk_azon">Alkatrész</label>
                <select name="alk_azon">
                @foreach ($alkatreszs as $alkatresz)
                <option value="{{ $alkatresz->alk_azon }}">{{ $alkatresz->alk_azon }}</option>
                @endforeach
                </select><br>
                <label for="beszall_kod">Beszállító kód</label>
                <select name="beszall_kod">
                @foreach ($beszallitos as $beszallito)
                <option value="{{ $beszallito->beszall_kod }}">{{ $beszallito->beszall_kod }}</option>
                @endforeach
                </select><br>
                <label for="egyseg_ar">Egységár</label>
                <input type="number" id="egyseg_ar" name="egyseg_ar"><br>
                <label for="mennyiseg">Mennyiség</label>
                <input type="number" id="mennyiseg" name="mennyiseg"><br>
                <label for="besz_osszege">Beszerzés összege</label>
                <input type="number" id="besz_osszege" name="besz_osszege" readonly><br>
                
                <input type="submit" value="Feltöltés">
              </form> 
        </article>
    </main>
</div>
</body>
</html>