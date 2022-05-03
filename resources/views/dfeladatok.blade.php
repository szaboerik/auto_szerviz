<?php
function check(){
    if(isset($_SESSION["dbelepve"])){ return true;}
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
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/dstilus.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="/js/Ajax.js"></script>
    <script src="/js/feladat.js"></script>
    <script src="/js/feladatscript.js"></script>
    <meta name="csrf-token" content=<?php $token=csrf_token(); echo $token;?>>
    <title>Feladatok</title>
</head>
<body>
    <main class="grid-container">
        
        <aside class="sidebardolgozo">
        <div class="menubar">
                <div class="menu">
                <ul class="menu-links">
                    <li>
                            <a href="/kilepes">
                            <i class='bx bx-log-out icon' ></i>
                                <span class="text nav-text">Kijelentkezés</span>
                            </a>
                        </li>                                           
                </ul>
                </div> 
            </div>
        </aside>
        <article class="item3">
            <h2>Feladatok</h2>
            <aside class="gyerek">
            <table>
                <tr style="display: none;">
                    <td class="f_szam">Feladatszám</td>
                    <td class="m_szam">Munkaszám</td>
                    <td class="elnevezes">Jelleg</td>
                    <td class="dolg_nev">Szerelő</td>
                    <td class="rendszam">Rendszám</td>
                </tr>
            </table>
        </aside>
        <section class="szulo">
            <table cellspacing="0">
            <tbody>
                <thead>
                    <tr>
                        <th>Feladatszám<m/th>
                        <th>Munkaszám</th>
                        <th>Jelleg</th>
                        <th>Szerelő</th>
                        <th>Rendszám</th>
                    </tr>
                </thead>
                </tbody>
            </table>
            </section>
        </article>
        <nav class="dropdownmenu" id="dropdownmenu">
        <div class="dropdown">
        <button class="dropbtn"><i class='bx bx-menu'></i></i></button>
                <div class="dropdown-content">
                     
                <ul class="menu-links">
                    
                    <li class="nav-link">
                            <a href="/kilepes">
                            <i class='bx bx-log-out icon' ></i>
                                <span class="text nav-text">Kijelentkezés</span>
                            </a>
                        </li>                                           
                </ul>
                </div> 
            </div>
        </nav>
    </main>
</body>
</html>