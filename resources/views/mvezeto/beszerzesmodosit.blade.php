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
  <div style="width: 80%; margin: auto;">
    <form action="/api/beszerzes/{{ $beszerzes->besz_azon }}" method="POST">
      @csrf
      @method('put')
        <label for="besz_azon">Beszerzés azonosító</label>
        <input type="number" id="besz_azon" name="besz_azon" value="{{ $beszerzes->besz_azon }}" readonly><br>
        <label for="f_szam">Feladatszám</label>
                <select name="f_szam">
                
                @foreach ($feladats as $feladat)
                <option value="{{ $feladat->f_szam }}"{{$feladat->f_szam == $beszerzes->f_szam ? 'selected' : 'disabled'}}>{{ $feladat->f_szam }} </option>
                @endforeach
                </select><br>
                <label for="alk_azon">Alkatrész</label>
                <select name="alk_azon">
                @foreach ($alkatreszs as $alkatresz)
                <option value="{{ $alkatresz->alk_azon }}">{{ $alkatresz->alk_neve }}</option>
                @endforeach
                </select><br>
                <label for="beszall_kod">Beszállító kód</label>
                <select name="beszall_kod">
                @foreach ($beszallitos as $beszallito)
                <option value="{{ $beszallito->beszall_kod }}">{{ $beszallito->nev }}</option>
                @endforeach
                </select><br>
        <label for="egyseg_ar">Egységár</label>
        <input type="number" id="egyseg_ar" name="egyseg_ar" value="{{ $beszerzes->egyseg_ar }}"><br>
        <label for="mennyiseg">Mennyiség</label>
        <input type="number" id="mennyiseg" name="mennyiseg" value="{{ $beszerzes->mennyiseg }}"><br>
        <label for="besz_osszege">Beszerzés összege</label>
        <input type="number" id="besz_osszege" name="besz_osszege" value="{{ $beszerzes->besz_osszege }}" readonly><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
      <a href="{{url()->previous()}}" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>