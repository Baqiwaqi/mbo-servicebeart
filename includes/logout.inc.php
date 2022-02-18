<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 8-3-2019
 * Time: 12:42
 */
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");