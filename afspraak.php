<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!--calender link & script-->
    <link href='packages/core/main.css' rel='stylesheet' />
    <link href='packages/daygrid/main.css' rel='stylesheet' />
    <script src='packages/core/main.js'></script>
    <script src='packages/interaction/main.js'></script>
    <script src='packages/daygrid/main.js'></script>
    <!--/calender link & script-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-afspraak.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable:true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: 'load.php',
                selectable:true,
                selectHelper:true,
                select: function(start, end, allDay)
                {
                    var title = prompt("Enter Event Title");
                    if(title)
                    {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url:"insert.php",
                            type:"POST",
                            data:{title:title, start:start, end:end},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Added Successfully");
                            }
                        })
                    }
                },
                editable:true,
                eventResize:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"update.php",
                        type:"POST",
                        data:{title:title, start:start, end:end, id:id},
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            alert('Event Update');
                        }
                    })
                },

                eventDrop:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"update.php",
                        type:"POST",
                        data:{title:title, start:start, end:end, id:id},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                        }
                    });
                },

                eventClick:function(event)
                {
                    if(confirm("Are you sure you want to remove it?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"delete.php",
                            type:"POST",
                            data:{id:id},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Removed");
                            }
                        })
                    }
                },

            });
        });

    </script>
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
<!--main-->
<nav aria-label="breadcrumb" id="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Afspraak maken</li>
    </ol>
</nav>
<!--Agenda-->
<h2 align="center"><a href="#">Maak een afspraak</a></h2>
<br />
<div class="container-fluid" id="">
    <div class="row">
        <div class="col-lg-3" id="afspraak-from">
            <h5>Maak een afspraak</h5>
            <form class="form-horizontal" action="insert.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="datum">Datum:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" id="date" placeholder="" name="start">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="omschrijving">Omschrijving:</label>
                    <div class="col-sm-10">
                        <select class="col-sm-12" name="title">
                            <option value="Grote beurt">Grote beurt</option>
                            <option value="Reparatie">Reparatie</option>
                            <option value="Airco onderhoud">Airco onderhoud</option>
                            <option value="APK">APK</option>
                            <option value="remmenservice">remmenservice</option>
                            <option value="Kleinebeurt">Kleine beurt</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-warning" id="afspraakbtn" name="submit">Maak afspraak</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-9" id="agenda-form">
            <div id='calendar'></div>
        </div>
    </div>
</div>
<div class="container">
    <div id="calendar"></div>
</div>


<!--/main-->
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