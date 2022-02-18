<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 8-3-2019
 * Time: 17:10
 */
if(isset($_POST["submit"])) {

    require 'dbh.php';

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordHerhaling = $_POST['pwdh'];

    if (empty($voornaam) || empty($achternaam) || empty($adres) ||
        empty($huisnummer) || empty($postcode) || empty($woonplaats) ||
        empty($email) || empty($password) || empty($passwordHerhaling)) {
        header("location: ../klantgegevens.php? error=emptyfields&voornaam=" . $voornaam . "&mail=" . $email);
        exit();
    }
    // email validation werkt niet goed
    /*elseif (!filter_var($email, FILTER_VALIDATE_EMAIL && !preg_match("/^[a_zA-Z0-9]*$/", $voornaam))) {
        header("location: ../aanmelden.php?error=invalidmail&voornaam=".$voornaam);
        exit();
    }*/
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../klantgegevens.php? error=invalidmail");
        exit();
    } elseif (!preg_match("/^[a_zA-Z0-9]*$/", $voornaam)) {
        header("location: ../klantgegevens.php? error=invalidvoornaam");
        exit();
    } elseif (!preg_match("/^[0-9]{4}\s[A-Z]{2}$/", $postcode)) {
        header("location: ../klantgegevens.php? error=invalidpostcode&voornaam=" . $voornaam . "&mail=" . $email);
        exit();
    } elseif ($password !== $passwordHerhaling) {
        header("location: ../klantgegevens.php? error=passwordCheck&voornaam=" . $voornaam . "&mail=" . $email);
        exit();
    }
    else {
        $user = $_SESSION['userId'];
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE `users` SET `voornaamUsers` = '$voornaam', `achternaamUsers` = '$achternaam', `adresUsers` = '$adres', `huisnummerUsers` = '$huisnummer', `postcodeUsers` = '$postcode', `woonplaatsUser` = '$woonplaats', `emailUsers` = '$email', `pwdUsers` = '$hashedPwd' WHERE `users`.`idUsers` = $user";
        $query = $conn->query($sql);
        if($query = TRUE){
            header("Location: ../klantgegevens.php?succes=update");
        } else {
            header("Location: ../klantgegevens.php?error=update");
            exit();
        }
    }
}

