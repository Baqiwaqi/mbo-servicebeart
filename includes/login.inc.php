 <?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 8-3-2019
 * Time: 11:37
 */
if (isset($_POST["submit"])){

    require 'dbh.php';

    $email = $_POST["email"];
    $password = $_POST["pwd"];

    if (empty($email) || empty($password)) {
        header("Location: ../inloggen.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../inloggen.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../inloggen.php?error=wrongpassword");
                    exit();
                }
                elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userEmail'] = $row['emailUsers'];

                    if ($_SESSION['userEmail'] == "admin@admin.nl"){
                        header("Location: ../index-admin.php?login=success");
                        exit();
                    }
                    else {
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                }
                else {
                    header("Location: ../inloggen.php?error=wrongpwd");
                    exit();
                }
             }
            else {
                header("Location: ../inloggen.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location ../index.php");
    exit();
}