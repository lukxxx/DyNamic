<?php 
$host = "localhost";
$db = "users";
$user = "root";
$pass = "";
try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>