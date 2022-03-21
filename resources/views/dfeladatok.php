<!DOCTYPE html>
<html lang="en">
<head>
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/stilus.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/Ajax.js"></script>
    <script src="/js/feladat.js"></script>
    <script src="/js/feladatscript.js"></script>
    <meta name="csrf-token" content=<?php $token=csrf_token(); echo $token;?>>
    <title>Feladatok</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Feladatok
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
            <h2>Feladatok</h2>
            <aside class="gyerek">
            <table>
                <tr>
                    <td class="f_szam">Feladatszám</td>
                    <td class="m_szam">Munkaszám</td>
                    <td class="jelleg">Jelleg</td>
                    <td class="szerelo">Szerelő</td>
                </tr>
            </table>
        </aside>
        <section class="szulo">
            <table>
                <thead>
                    <tr>
                        <th>Feladatszám</th>
                        <th>Munkaszám</th>
                        <th>Jelleg</th>
                        <th>Szerelő</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </section>
        </article>
    </main>
</body>
</html>