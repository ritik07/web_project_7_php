<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['id']);
$_SESSION['STATUS'] = 'loggedout';
header('location:index.php');
die();
