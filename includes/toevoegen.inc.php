<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 15-1-2019
 * Time: */
if(isset($_POST["submit"])){

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
         empty($huisnummer) || empty($postcode) ||empty($woonplaats) ||
         empty($email) || empty($password) || empty($passwordHerhaling) ) {
         header("location: ../klanttoevoegen.php? error=emptyfields&voornaam=".$voornaam."&mail=".$email);
         exit();
     }
     // email validation werkt niet goed
     /*elseif (!filter_var($email, FILTER_VALIDATE_EMAIL && !preg_match("/^[a_zA-Z0-9]*$/", $voornaam))) {
         header("location: ../aanmelden.php?error=invalidmail&voornaam=".$voornaam);
         exit();
     }*/
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header("location: ../klanttoevoegen.php? error=invalidmail&voornaam=".$voornaam);
         exit();
     }
     elseif (!preg_match("/^[a_zA-Z0-9]*$/", $voornaam)) {
         header("location: ../klanttoevoegen.php? error=invalidvoornaam&mail".$email);
         exit();
     }
     elseif (!preg_match("/^[0-9]{4}\s[A-Z]{2}$/", $postcode)) {
         header("location: ../klanttoevoegen.php? error=invalidpostcode&voornaam=".$voornaam."&mail=".$email);
         exit();
     }
     elseif ($password !== $passwordHerhaling) {
         header("location: ../klanttoevoegen.php? error=passwordCheck&voornaam=".$voornaam."&mail=".$email);
         exit();
     }
     else {
         $sql = "SELECT emailUsers From users WHERE emailUsers=?";
         $stmt = mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location ../klanttoevoegen.php?error=sqlerror");
             exit();
         }
         else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location ../klanttoevoegen.php?error=emailtaken");
                exit();
            }
            else {
                $sql = "INSERT INTO users (voornaamUsers, achternaamUsers, adresUsers, huisnummerUsers, postcodeUsers, woonplaatsUser, emailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../klanttoevoegen.php?error=sqlerror");
                    exit;
                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"ssssssss", $voornaam,$achternaam, $adres, $huisnummer, $postcode, $woonplaats, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../klanttoevoegen.php?succes=signup");
                    exit();
                }

            }
         }

     }
     mysqli_stmt_close($stmt);
     mysqli_close($conn);

}
else  {
    header("Location ../aanmelden.inc.php");
    exit();
}
