<!doctype html>
<html lang="de">
<head>
    <meta name="organization" content="Stiftung Universität Hildesheim">
    <meta name="group" content="Gruppe 4">
    <meta name="author" content="Johanna Zellmer">
    <meta name="author" content="Ghada Dridi">
    <meta name="author" content="Richard Henkenjohann">
    <meta name="author" content="Vanessa Brinkmann">

    <title>Umfrage Zero Waste</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                <a class="nav-link active" href="index.php">Umfrage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="ergebnisse.php"> Ergebnissen</a>
            </li>

        </ul>
    </div>
</div>
<div class="container card-body">

    <?php

    require_once 'DBHandler.php';

    $db = new DBHandler();

    if (isset($_POST['FORM_SUBMIT'])) {
echo 'tessssssssssst';
        $submitInput = true;

        foreach ($_POST as $field => $item) {
            if (false !== strpos($item, '<?php') || false !== strpos($item, 'sql')) {
                $submitInput = false;
                break;
            }
        }
        if (true !== $submitInput) {
            echo sprintf(
                '<div class="alert alert-danger" role="alert">Ungültige Eingabe in <em>%s</em>!</div>',
                $field
            );
        } else {
            $teilnehmerId = $db->speichereTeilnehmer($_POST['age'], $_POST['sex']);

            for ($i = 1; $i <= 4; $i++) {
                switch ($i) {
                    case 1:
                        $db->speichereAntwort($i, $teilnehmerId, $_POST['plastikverbrauch']);
                        break;

                    case 2:
                        $db->speichereAntwort($i, $teilnehmerId, $_POST['plastikverbrauch_skala']);
                        break;

                    case 3:
                        $db->speichereAntwort($i, $teilnehmerId, $_POST['produkte']);
                        break;

                    case 4:
                        $db->speichereAntwort($i, $teilnehmerId, $_POST['plastikverbrauch_reduzieren']);
                        break;
                }
            }

            echo '<div class="alert alert-success" role="alert">Formulardaten wurden übermittelt.</div>';
        }
    }

    ?>

    <div class="row ">
        <div class="col-md-12">

            <p><strong>Liebe/r Teilnehmer/in,</strong></p>
            <p class="text-left">im Rahmen des Kurses „Aktuelle Standards:
                Formalisierung“möchten wir eine Umfrage
                zu dem Thema <strong> „Zero Waste“ </strong> durchführen. Du unterstützt uns mit deiner Teilnahme bei
                der Vervollständigung unseres Projekts. Die Umfrage beinhaltet <strong> lediglich 6 Fragen </strong> und dauert nur ein paar
                Minuten. Wir wollen einen Überblick über euer Kaufverhalten im Supermarkt erhalten. Viel Vergnügen!</p>
        </div>
    </div>
    <br/>  <br>
    <form action="index.php" method="POST" >
        <input type="hidden" name="FORM_SUBMIT" value="umfrage_zero_waste">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input_age"><strong>1. Wie alt bist du?</strong></label>
                    <input type="text" class="form-control" name="age" id="input_age">
                </div>
            </div>
            <br>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input_sex"><strong>2. Welchem Geschlecht fühlst du dich zugehörig?</strong></label>
                    <select class="custom-select mr-sm-2" name="sex" id="input_sex">
                        <option selected>Auswählen…</option>
                        <option value="weiblich">weiblich</option>
                        <option value="männlich">männlich</option>
                        <option value="divers">divers</option>
                    </select>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>3. Achtest du aktiv auf deinen Plastikverbrauch?</strong></label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="input_plastikverbrauch_1" name="plastikverbrauch"
                               class="custom-control-input" value="Ja">
                        <label class="custom-control-label" for="input_plastikverbrauch_1">Ja</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="input_plastikverbrauch_0" name="plastikverbrauch"
                               class="custom-control-input" value="Nein">
                        <label class="custom-control-label" for="input_plastikverbrauch_0">Nein</label>
                    </div>
                </div>
            </div><br>
            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>4. Wie schätzt du deinen Plastikverbrauch auf einer Skala von 0-5 (0 sehr wenig, 5
                            sehr hoch)
                            ein?</strong></label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="plastikverbrauch_skala_0">sehr wenig&nbsp;&nbsp;</label>
                        <input class="form-check-input" type="radio" name="plastikverbrauch_skala"
                               id="plastikverbrauch_skala_0"
                               value="0">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="plastikverbrauch_skala"
                               id="plastikverbrauch_skala_1"
                               value="1">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="plastikverbrauch_skala"
                               id="plastikverbrauch_skala_2"
                               value="2">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="plastikverbrauch_skala"
                               id="plastikverbrauch_skala_3"
                               value="3">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="plastikverbrauch_skala"
                               id="plastikverbrauch_skala_4"
                               value="4">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="plastikverbrauch_skala"
                               id="plastikverbrauch_skala_5"
                               value="5">
                        <label class="form-check-label" for="plastikverbrauch_skala_5">&nbsp;&nbsp;sehr hoch</label>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input_produkte"><strong>5. Für welche Produkte würdest du eine Plastiktüte
                            verwenden?</strong></label>
                    <input type="text" name="produkte" class="form-control" id="input_produkte">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input_plastikverbrauch_reduzieren"><strong>6. Wie könnten Supermärkte deinen
                            Plastikverbrauch
                            reduzieren?</strong></label>
                    <textarea class="form-control" name="plastikverbrauch_reduzieren"
                              id="input_plastikverbrauch_reduzieren" rows="3"></textarea>
                </div>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-6" style=" margin-left: 150px ">
                <button type="submit" id="submit" class="btn btn-info" ><strong>Absenden <img src="ASlogo.png" width="25px;" height="25px;" ></strong></button>
            </div>
        </div>
        <br>
    </form>

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
<footer class="page-footer font-small special-color-dark pt-4">
    <div class="py-1" style="background-color:rgba(148,148,148,0.4) ; color: #f5f1ed ;" >
        <p class="text-secondary">
            &nbsp;  &nbsp;  <img src="LogoAS.png" width="85px;" height="90px; ; " >
            &nbsp;  &nbsp;   Die Umfrage wurde erstellt von :
            &nbsp;              Johanna Zellmer
            &nbsp;&amp   &nbsp;    Ghada Didri
            &nbsp;    &amp    &nbsp;    Richard Henkenjohann
            &nbsp;&amp &nbsp;    Vanessa Brinkmann
        </p>
    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color:#000000 ; color: beige" >© 2019 Gruppe 4 : Aktuelle Standards
        <a href="https://www.uni-hildesheim.de/"> UNI-Hildesheim</a>
    </div>
    <!-- Copyright -->

</footer>
</html>