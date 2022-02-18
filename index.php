<?php
    session_start();
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agenda.php">Afspraak maken</a>
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
                                    <a class=\"nav-link\" href=\"klantgegevens.php\">Mijn gegevens</a>
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

<!--carousel-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img max-width="100%" height="300px"src="img/carousel1.jpg"/>
            <div class="container">
                <div class="carousel-caption text-left">
                    <h2>Bereken uw prijs en maak een afspraak</h2>
                    <p>
                        <ul>
                            <li>Onderhoud met vaste prijs</li>
                            <li>Betaal achteraf na onderhoud</li>
                        </ul>

                        <ul>
                            <li>Onderhoud met vaste prijs</li>
                            <li>Betaal achteraf na onderhoud</li>
                        </ul>

                    </p>
                    <p><a class="btn btn-md btn-primary" id="afspraakbtn" href="#" role="button">Maak afspraak</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img max-width="100%" height="300px"src="img/carousel2.jpg"/>
            <div class="container">
                <div class="carousel-caption text-center">
                    <h2>Onderhoud & reeparatie</h2>
                        <ul class="text-left">
                            <li>Zeer betrouwbaar</li>
                            <li>Vakkundig</li>
                            <li>Professioneel</li>
                        </ul>
                    <p><a class="btn btn-md btn-primary" id="afspraakbtn" href="#" role="button">Meer info..</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img max-width="100%" height="300px"src="img/carousel3.jpg"/>
            <div class="container">
                <div class="carousel-caption text-right">
                    <h2>Contact</h2>
                    <p>Voor vragen neem contact met ons op. Wij willen je graag je helpen.</p>
                    <p><a class="btn btn-md btn-primary" id="afspraakbtn" href="#" role="button">Contact</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--/carousel -->
<!-- container services-->
<div class="container-fluid" id="servicead">
    <div class="row">
       <div class="col-lg-4 text-center" id="serviceinfo" >
           <img class="rounded-circle" src="svg/si-glyph-checked.svg" alt="" width="70" height="70">
           <h4>WINTERCHECK</h4>
           <p>Vakgarage zorgt er voor dat uw auto winterklaaris. Zo kunt u veilig en met een gerust gevoel de weg op.</p>
       </div>
        <div class="col-lg-4 text-center" id="serviceinfo2">
            <img class="rounded-circle" src="svg/si-glyph-hammer-and-wrench.svg" alt="" width="70" height="70">
            <h4 >PECHHULP</h4>
            <p>Ga zorgeloos de weg op met de Vakgarage Pechhulp</p>
        </div>
        <div class="col-lg-4 text-center" id="serviceinfo3">
            <img class="rounded-circle" src="svg/si-glyph-magnifier.svg" alt="" width="70" height="70">
            <h4>APK</h4>
            <p>Laat uw voertuig volgens de eisen keuren door onze keurmeester</p>
        </div>
    </div>
</div>
<!-- /container -->
<div class="container-fluid" id="servicead2">
    <div class="row">
        <div class="col-lg-7" id="serviceinfo4">
            <h4 class="text-white">De richtlijnen van de Vakgarage</h4>
            <p>Door het vertrouwen dat wij van onze klanten mogen ontvangen is ons bedrijf sinds de oprichting in 1994 onstuimig gegroeid.
                Ons dienstenpakket is enorm uitgebreid en er is een hecht team van medewerkers ontstaan.
                Onze toewijding op het gebied van betrouwbaarheid en service komt ondermeer tot uiting doordat wij ons hebben aangesloten bij Vakgarage.
            </p>
        </div>
        <div class="col-lg-5" id="serviceinfo5">
            <h4 class="text-white text-center">Contact</h4>
            <ul>
                <li>Middenweg 101</li>
                <li>1394 AE Nederhorst Den Berg</li>
                <li>info@vakgaragerichtlijn.nl</li>
            </ul>
            <p class="text-center"><a class="btn btn-md btn-primary" id="afspraakbtn2" href="#" role="button">0294-252525</a></p>
        </div>
    </div>
</div>
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