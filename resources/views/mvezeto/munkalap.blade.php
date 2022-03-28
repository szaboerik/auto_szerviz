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
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="beszerzesek">Beszerzések</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
        </nav>
        <article class="item3">
            <h2>Munkalap felvitele</h2>
            <form action="/api/munkalap" method="POST">
                @csrf
                <label for="m_szam">Munkaszám</label>
                <input type="number" id="m_szam" name="m_szam" readonly><br>
                <label for="ugyfel_neve">Ügyfél neve</label>
                <input type="text" id="ugyfel_neve" name="ugyfel_neve"><br>
                <label for="ugyfel_telszama">Ügyfél telefonszáma</label>
                <input type="text" id="ugyfel_telszama" name="ugyfel_telszama" value="{{ old('ugyfel_telszama') }}" placeholder="+36701234567"><br>
                @error('ugyfel_telszama')
                        <div class="alert alert-danger">{{ $errors->first('ugyfel_telszama') }}</div>
                    @enderror
                <label for="rendszam">Rendszám</label>
                <select name="rendszam" placeholder="ABC123">
                @foreach ($autos as $auto)
                <option value="{{ $auto->id }}">{{ $auto->rendszam }}</option>
                @endforeach
                </select><br>
                <label for="munka_kezdete">Munka kezdete</label>
                <input type="date" id="munka_kezdete" name="munka_kezdete" readonly><br>
                <label for="munka_vege">Munka vége</label>
                <input type="date" id="munka_vege" name="munka_vege" readonly><br>
                <label for="fizetendo">Fizetendő összeg</label>
                <input type="number" id="fizetendo" name="fizetendo" readonly><br>
                <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
              </form> 
        </article>
    </main>
</div>
</form>
</body>
</html>