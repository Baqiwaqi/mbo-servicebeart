<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-onderhoud.css">
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
<!--/header-->
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="afspraak.php">Afspraak maken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="onderhoudreparatie.php">Onderhoud & reparatie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['userId'])) {
                    echo "
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"#\">Mijn gegevens</a>
                                </li>
                             ";
                }
                ?>
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
<!-- breadcrumbs -->
<nav aria-label="breadcrumb" id="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Onderhoud & reparatie</li>
    </ol>
</nav>
<!-- /breadcrumbs -->
<!--carousel-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img max-width="100%" height="600px"src="img/Onderhoud2.jpg"/>
            <div class="container" id="caption">
                <div class="carousel-caption text-left">
                    <h2>Onderhoud en reparatie</h2>
                    <h4>Van uw auto, motor of caravan</h4>
                    <p>
                    <ul>
                        <li><img class="" src="svg/si-glyph-checked.svg" alt="" width="12px" height="12px"> Zeer betrouwbaar</li>
                        <li><img class="" src="svg/si-glyph-checked.svg" alt="" width="12px" height="12px"> Vakkundig</li>
                        <li><img class="" src="svg/si-glyph-checked.svg" alt="" width="12px" height="12px"> Professioneel</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/carousel -->
<div class="container" id="servicead">
    <div class="row">
        <div class="col-lg-12 text-left" id="serviceinfo" >
            <h2>BEREKEN UW PRIJS EN MAAK EEN AFSPRAAK</h2>
            <ul>
                <li><img class="" src="svg/si-glyph-checked.svg" alt="" width="12px" height="12px"> Onderhoud met vaste prijs</li>
                <li><img class="" src="svg/si-glyph-checked.svg" alt="" width="12px" height="12px"> Betaal achteraf na onderhoud</li>
                <li><img class="" src="svg/si-glyph-checked.svg" alt="" width="12px" height="12px"> Specialist in Nederhorst den Berg e.o</li>
                <li><img class="" src="svg/si-glyph-checked.svg" alt="" width="12px" height="12px"> BOVAG en RDW erkend</li>
            </ul>
            <p class="text-center"><a class="btn btn-md btn-primary" id="afspraakbtn" href="#" role="button">Meer info..</a></p>
        </div>
    </div>
</div>

<div class="container-fluid" id="sidenavinfo">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-2" id="sidenav">
            <h4>Onderhoud en reparatie</h4>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Vakantiecheck</a></li>
                <li><a class="text-muted" href="#">Onderhoud en reparatie</a></li>
                <li><a class="text-muted" href="#">Pechhulp</a></li>
                <li><a class="text-muted" href="#">Schadeherstel</a></li>
                <li><a class="text-muted" href="#">Grote beurt</a></li>
                <li><a class="text-muted" href="#">Alles over banden</a></li>
            </ul>
        </div>
        <div class="col-lg-7" id="navinfo">
            <h5>AUTOVISIE BIJ ONDERHOUD EN REPARATIE</h5>
            <p>
                Als u nu een auto onderhoudsbeurt of reparatie laat uitvoeren door uw Vakgarage, dan krijgt u gratis een mini abonnement op het blad Autovisie ter waarde van €21,-.
                U ontvangt een speciale Vakgarage editie van dit tweewekelijkse automagazine met daarin een voucher voor een abonnement van nog eens 3 nummers.
                Leuk om te krijgen of cadeau te doen!
            </p>
            <p>
                Na ontvangst van de eerste Autovisie kunt u de code inwisselen voor het abonnement.
                Na het invullen van uw gegevens wordt uw abonnement geactiveerd en ontvangt u hiervan een welkomstmail.
                Tevens ontvangt u de 3 nummers van Autovisie digitaal op uw tablet.
                Uw abonnement wordt vervolgens automatisch stopgezet.
                Uw persoonlijke code is te activeren tot 30 april 2019 en vrij overdraagbaar.
            </p>
            <p><a class="btn btn-md btn-primary" id="afspraakbtn" href="#" role="button">Plan nu uw afspraak</a></p>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<div class="container-fluid" id="sidenavinfo">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-7" id="navinfo">
            <h5>AUTO ONDERHOUD EN REPARATIE NEDERHORST DEN BERG</h5>
            <p>
                Het regelmatig laten onderhouden van uw auto zorgt ervoor dat deze de waarde langer behoudt en het zorgt er ook voor dat u niet voor onaangename verrassingen komt te staan.
                Tijdens een onderhoudscheck bij Vakgarage Richtlijn is het mogelijk dat defecte onderdelen aan de auto ontdekt worden voordat dit schade toebrengt.
                Vakgarage Richtlijn verricht op vakkundige wijze onderhoud en reparatie aan uw auto.
                Heeft uw auto onderhoud nodig en woont u in of nabij Nederhorst Den Berg, kom dan gerust langs bij Vakgarage Richtlijn.
                Wij voeren onderhoud uit aan elke auto, van elk merk.
            </p>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<div class="container-fluid" id="sidenavinfo">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-7" id="navinfo">
            <p>
                Geeft uw auto de periodieke onderhoudsbeurt aan in het dashboard, of voelt u dat de auto toe is aan een onderhoudsbeurt of reparatie?
                Zorg dat u een afspraak maakt en hier niet te lang mee doorrijdt.
                Vakgarage Richtlijn  gelegen aan Middenweg 101 bekijkt uw auto en bepaalt altijd voorafgaand aan de onderhoudsbeurt wat de kosten zullen zijn.
                Neem gerust contact met ons op via telefoonnummer <span id="text">0294-252325</span> of mail naar <span id="text">info@vakgaragerichtlijn.nl</span>
            </p>
            <p><a class="btn btn-md btn-primary" id="afspraakbtn" href="contact.php" role="button">Neem contact op</a></p>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<br>
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
                <li><a class="text-muted" href="onderhoudreparatie.php">Vakantiecheck</a></li>
                <li><a class="text-muted" href="onderhoudreparatie.php">Onderhoud en reparatie</a></li>
                <li><a class="text-muted" href="onderhoudreparatie.php">Pechhulp</a></li>
                <li><a class="text-muted" href="onderhoudreparatie.php">Schadeherstel</a></li>
                <li><a class="text-muted" href="onderhoudreparatie.php">Grote beurt</a></li>
                <li><a class="text-muted" href="onderhoudreparatie.php">Alles over banden</a></li>
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
                <li><a class="text-muted" href="contact.php">Nieuwsbrief</a></li>
                <li><a class="text-muted" href="contact.php">Formulier</a></li>
            </ul>
        </div>
    </div>
</footer>
<!--footer-->
</body>
</html>