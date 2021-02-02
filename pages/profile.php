<!DOCTYPE html>
<html lang="en">
<?php include "../components/head.php"; 

// Define database connection parameters
$db_host = "127.0.0.1";
$db_name = "users";
$db_user = "root";
$db_pass = "";


// Create a connection to the MySQL database using PDO
$pdo = new pdo(
    "mysql:host={$db_host};dbname={$db_name}",
    $db_user,
    $db_pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => FALSE
    ]
);
    $sth = $pdo->prepare("SELECT * FROM people WHERE meno = ?");
    $sth->execute(array($_SESSION['loggedin']));
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $date = $row['created_at'];


?>

<body>
    <header>
        <div class="container">
            <?php include "../components/navbar-pages.php" ?>
        </div>
    </header>
    <br>
    <main>
        <div class="container">
            <div style="border-radius: 10px; -webkit-box-shadow: 11px 11px 14px -5px rgba(81,81,81,0.67); 
            box-shadow: 11px 11px 14px -5px rgba(81,81,81,0.67);" class="jumbotron">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div style="border: 1px solid black;" class="profile-picture">
                        <img src="../assets/images/user.png" alt='profile-picture' style='display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 50%;
                            padding: 10px;'>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <h1>Meno: <?php echo $_SESSION['loggedin']?></h1>
                    <h5>Členom od: <?php echo $date ?></h5>
                </div>
            </div>
            <br>                
            </div>
        </div>
        
    </main>
    <?php include "../components/footer.php"?>

</body>
</html>