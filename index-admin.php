<?php
session_start();
if ($_SESSION['userEmail'] == "admin@admin.nl"){

}
else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<!--header-->
<div class="jumbotron">
    <h1 class="text-center">Vakgarage</h1>
    <p class="text-center">Voor al je reparaties en servicebeurten</p>
</div>

<!--nabar-->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index-admin.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Klanten
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="klantaanpassen.php"><span class="dropdown-item-text">Klanten aanpassen</span></a>
                        <a class="dropdown-item" href="klanttoevoegen.php"><span class="dropdown-item-text">Klanten toevoegen</span></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Producten
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><span class="dropdown-item-text">Producten invoeren</span></a>
                        <a class="dropdown-item" href="#"><span class="dropdown-item-text">Producten toevoegen</span></a>
                        <a class="dropdown-item" href="#"><span class="dropdown-item-text">Producten aanpassen</span></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Agenda
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><span class="dropdown-item-text">Afspraak maken</span></a>
                        <a class="dropdown-item" href="#"><span class="dropdown-item-text">Dag uitdraai</span></a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['userId'])) {
                    echo '<li class="nav-item">
                                <a class="nav-link" href="includes/logout.inc.php">Uitloggen</a>
                          </li>
                         ';
                }
                else {
                    echo '
                          <li class="nav-item">
                                <a class="nav-link" href="aanmelden.php">Aanmelden</a>
                          </li>
                          <li class="nav-item">
                                <a class="nav-link" href="inloggen.php">Inloggen</a>
                          </li>
                         ';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!--/navbar-->
<h1 class="text-center">Welkom admin</h1>
<!--footer-->
<footer class="container-fluid">
    <div class="row">
        <div class="col-12 col-md">
            <h4>Vakgarage</h4>
            <small class="d-block mb-3 text-muted">&copy; 2019</small>
        </div>
        <div class="col-6 col-md">
            <h5>Diensten</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Vakantiecheck</a></li>
                <li><a class="text-muted" href="#">Onderhoud en reparatie</a></li>
                <li><a class="text-muted" href="#">Pechhulp</a></li>
                <li><a class="text-muted" href="#">Schadeherstel</a></li>
                <li><a class="text-muted" href="#">Grote beurt</a></li>
                <li><a class="text-muted" href="#">Alles over banden</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Onderdelen en producten</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Accesoires</a></li>
                <li><a class="text-muted" href="#">Trekhaken</a></li>
                <li><a class="text-muted" href="#">Oliefilter</a></li>
                <li><a class="text-muted" href="#">Distributieriem</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Over vakgarage</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Over Vakgarage</a></li>
                <li><a class="text-muted" href="#">Vacatures</a></li>
                <li><a class="text-muted" href="#">Locaties</a></li>
                <li><a class="text-muted" href="#">Actueel</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Contact</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="contact.php">Locaties</a></li>
                <li><a class="text-muted" href="contact.php">Contact</a></li>
                <li><a class="text-muted" href="#">Nieuwsbrief</a></li>
                <li><a class="text-muted" href="#">Formulier</a></li>
            </ul>
        </div>
    </div>
</footer>
<!--footer-->
</body>
</html>