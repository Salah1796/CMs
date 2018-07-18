<?php
ob_start();
session_start();

$_SESSION["username"]    =  null;
$_SESSION["Password"]    =  null;
$_SESSION['role']        =  null;
$_SESSION['id']          =  null;
header('location:../../');
?>
