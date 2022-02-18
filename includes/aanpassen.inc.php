<?php
if(isset($_POST["update"])) {

    require 'dbh.php';

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $email = $_POST['email'];

    if (empty($voornaam) || empty($achternaam) || empty($adres) ||
        empty($huisnummer) || empty($postcode) || empty($woonplaats) ||
        empty($email)) {
        header("location: ../klantaanpassen.php?error=emptyfields&voornaam=" . $voornaam . "&mail=" . $email);
        exit();
    }
    // email validation werkt niet goed
    /*elseif (!filter_var($email, FILTER_VALIDATE_EMAIL && !preg_match("/^[a_zA-Z0-9]*$/", $voornaam))) {
        header("location: ../aanmelden.php?error=invalidmail&voornaam=".$voornaam);
        exit();
    }*/
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../klantaanpassen.php? error=invalidmail");
        exit();
    } elseif (!preg_match("/^[a_zA-Z0-9]*$/", $voornaam)) {
        header("location: ../klantaanpassen.php? error=invalidvoornaam");
        exit();
    } elseif (!preg_match("/^[0-9]{4}\s[A-Z]{2}$/", $postcode)) {
        header("location: ../klantaanpassen.php? error=invalidpostcode&voornaam=" . $voornaam . "&mail=" . $email);
        exit();
    } elseif ($password !== $passwordHerhaling) {
        header("location: ../klantaanpassen.php? error=passwordCheck&voornaam=" . $voornaam . "&mail=" . $email);
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE emailUsers='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['idUsers'];
            }
        }

        $sql = "UPDATE `users` SET `voornaamUsers` = '$voornaam', `achternaamUsers` = '$achternaam', `adresUsers` = '$adres', `huisnummerUsers` = '$huisnummer', `postcodeUsers` = '$postcode', `woonplaatsUser` = '$woonplaats', `emailUsers` = '$email' WHERE `users`.`idUsers` = $id";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            header("Location: ../klantaanpassen.php?succes=update");
            exit();
        } else {
            header("Location: ../klantaanpassen.php?error=update");
            exit();
        }
    }

}