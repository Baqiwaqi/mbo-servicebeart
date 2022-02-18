<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-contact.css">
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
        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
    </ol>
</nav>
<!-- /breadcrumbs -->
<!-- maincontainer -->
<div class="container" id="maplocatie">
    <div class="row">
        <!-- google map -->
        <div class="col-lg-8">
            <iframe width="100%" height="400px" id="gmap_canvas" src="https://maps.google.com/maps?q=nederhorst%20den%20berg%20vakgarage&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
        </div>
        <!-- /google map -->
        <!-- contact gegevens -->
        <div class="col-lg-4">
            <h3>Contact gegevens</h3>
            <ul class="list-unstyled">
                <li><strong>Vakgarge Richtlijn</strong></li>
                <li>Middenweg 101</li>
                <li>1394 AE Nederhorst den berg</li>
                <li>0294-252325</li>
                <li><span id="text">nederhorst@vakgaragerichtlijn.nl</span></li>
            </ul>
        </div>
        <!-- /contact gegevens -->
    </div>
    <!-- Timetable -->
    <div class="row">
        <div class="col-lg-12" id="openingstijden">
            <h3 class="text-center">Openingstijden</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Werkplaats</th>
                    <th scope="col">Showroom</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Maandag</th>
                    <td>8:00 - 17:00</td>
                    <td>8:00 - 18:00</td>
                </tr>
                <tr>
                    <th scope="row">Dinsdag</th>
                    <td>8:00 - 17:00</td>
                    <td>8:00 - 18:00</td>
                </tr>
                <tr>
                    <th scope="row">Woensdag</th>
                    <td>8:00 - 17:00</td>
                    <td>8:00 - 18:00</td>
                </tr>
                <tr>
                    <th scope="row">Donderdag</th>
                    <td>8:00 - 17:00</td>
                    <td>8:00 - 18:00</td>
                </tr>
                <tr>
                    <th scope="row">Vrijdag</th>
                    <td>8:00 - 17:00</td>
                    <td>8:00 - 18:00</td>
                </tr>
                <tr>
                    <th scope="row">Zaterdag</th>
                    <td>9:00 - 13:00</td>
                    <td>9:00 - 13:00</td>
                </tr>
                <tr>
                    <th scope="row">Zondag</th>
                    <td>Gesloten</td>
                    <td>Gesloten</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Timetable -->
    <!-- contactform -->
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" id="contactform">
            <h3>Neem contact met ons</h3>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Naam:</label>
                        <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Telefoonnummer:</label>
                        <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Emailadres:</label>
                        <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Bericht:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="afspraakbtn2">Send Message</button>
            </form>
        </div>
    </div>
    <!-- contactform -->
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