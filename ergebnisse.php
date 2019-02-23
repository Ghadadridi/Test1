<!doctype html>
<html lang="de">
<head>
    <meta name="organization" content="Stiftung Universität Hildesheim">
    <meta name="group" content="Gruppe 4">
    <meta name="author" content="Johanna Zellmer">
    <meta name="author" content="Ghada Dridi">
    <meta name="author" content="Richard Henkenjohann">
    <meta name="author" content="Vanessa Brinkmann">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Umfrage Zero Waste - Ergebnisse</title>
</head>
<body>

<div class="card text-center">
    <nav class="navbar navbar-light bg-white">
        <h1 class="navbar-brand, text-info">
            <a href="index.php" ><img src="logo.jpg" width="130" height="100" alt="" ></a>
            <strong>Zero Waste</strong>
            <small class="text-muted" style=" font-family: 'Calibri Light (Überschriften)' ;">Eine Umfrage zu deinem Kaufverhalten</small>
        </h1>
    </nav>
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link " href="index.php">Umfrage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="ergebnisse.php"> Ergebnissen</a>
            </li>

        </ul>
    </div>

</div>


<?php

require_once 'DBHandler.php';

$db = new DBHandler();

$ergebnisse = $db->ladeErgebnisse();

?>

<div class="container  card-body" style=" margin-left: 40px; ">

<br><br>
    <div class="table-responsive row"  style="  width: 1430px;">


            <table class="table" style="width: 1430px" >
                <th class="table-info">Teilnehmer</th>
                <th class="table-info">Alter</th>

                <th class="table-info">Geschlecht</th>
                <th class="table-info">Achtest du aktiv auf deinen Plastikverbrauch?</th>
                <th class="table-info">Wie schätzt du deinen Plastikverbrauch auf einer Skala von 0-5 ein?</th>
                <th class="table-info">Für welche Produkte würdest du eine Plastiktüte verwenden?</th>
                <th class="table-info">Wie könnten Supermärkte deinen Plastikverbrauch reduzieren?</th>
                </thead>
                <tbody>

                <?php foreach ($ergebnisse as $i => $antwort): ?>
                    <tr>
                        <td><?= $i ?></td>

                        <td><?= $antwort['alter'] ?></td>
                        <td><?= $antwort['geschlecht'] ?></td>
                        <td><?= $antwort[1] ?></td>
                        <td><?= $antwort[2] ?></td>
                        <td><?= $antwort[3] ?></td>
                        <td><?= $antwort[4] ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>


    </div>


</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">
    <div class="py-1" style="background-color:rgba(148,148,148,0.4) ; color: #f5f1ed ;" >
     <p class="text-secondary">
         &nbsp;   <img src="LogoAS.png" width="75px;" height="75px;" >
         &nbsp;  &nbsp;   Die Umfrage wurde erstellt von :  Johanna Zellmer &amp Ghada Didri
                                     &amp  Richard Henkenjohann &nbsp;&amp Vanessa Brinkmann
                    </p>
 </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color:#000000 ; color: beige" >© 2019 Gruppe 4 : Aktuelle Standards
        <a href="https://www.uni-hildesheim.de/"> UNI-Hildesheim</a>
    </div>
    <!-- Copyright -->

</footer>
</html>