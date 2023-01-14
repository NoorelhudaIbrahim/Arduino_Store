<?php

include 'connect.php';

session_start();
session_unset();
session_destroy();
unset($_SESSION['user_id']);

header('location:../home.php');

?>