<?php
session_start();
unset($_SESSION["loggedin"]);
header("Location:logout-success.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include "../components/head.php"; 
?>
