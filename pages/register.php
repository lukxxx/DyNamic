<?php 
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

$error = "";
$error_pass = "";
$error_pass2 = "";



$options = [
    'cost' => 12,
];

if(isset($_POST['bimbambum'])){
    $username = $_POST['name'];
    $sth = $pdo->prepare("SELECT * FROM people WHERE meno = ?");
    $sth->execute(array($username));

    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $menicko = $row['meno'];
    
    if(empty($_POST['name'])){
        $error = "<div class='alert alert-danger' role='alert'>
        Nezadal si meno!
        </div>";
    } else if($_POST['name'] == $menicko){
        $error = "<div class='alert alert-warning' role='alert'>
        Toto používateľské meno už existuje!
        </div>";
    } else {
        $error = "";
        $username = $_POST['name'];
    }
    if(empty($_POST['password'])){
        $error_pass = "<div class='alert alert-danger' role='alert'>Nezadal si heslo!</div>";
    } else {
        $error_pass = "";
        $pass1 = $_POST['password'];
        $pass1_hash = password_hash($pass1, PASSWORD_BCRYPT, $options);
    }
    if(empty($_POST['pass2'])){
        $error_pass2 = "<div class='alert alert-danger' role='alert'>Heslá sa nezhodujú! Nezadal si heslo na kontrolu</div>";
    } else if($_POST['pass2'] !== $pass1){
        $error_pass2 = "<div class='alert alert-danger' role='alert'>Heslá sa nezhodujú</div>";
    } else {
        $error_pass2 = "";
        $pass2 = $pass1;
    }
    
    if($error == "" && $error_pass == "" && $error_pass2 == ""){
        $sql = "INSERT INTO people (meno, hesielko) VALUES (?,?)";
        $stmt= $pdo->prepare($sql);
        if($stmt->execute([$username, $pass1_hash])){
            $_SESSION['r-name'] = $username;
            header("location:thx.php");
        } else {
            $error_insert = "ERROR WITH DATABASE";
        }
    }
    
}



?>
<!DOCTYPE html>
<html lang="en">
<?php include "../components/head.php"; ?>
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
            box-shadow: 11px 11px 14px -5px rgba(81,81,81,0.67); text-align: center;" class="jumbotron">
                <div><?php echo $error ?></div>
                <div><?php echo $error_pass ?></div>
                <div><?php echo $error_pass2 ?></div>
                <h2>Registrujte sa!</h2>
                <div style="padding: 5% 25% 0% 25%">
                    <form method="post" action="">
                        <label>Meno</label><input type="text" name="name" class="form-control">
                        <label>Heslo</label><input type="password" name="password" class="form-control">
                        <label>Opakovať heslo</label><input type="password" name="pass2" class="form-control"><br>
                        <input type="submit" value="Registrovať" name="bimbambum" class="btn btn-success">
                    </form>
                </div>
                
            </div>
        </div>
        
    </main>
    <?php include "../components/footer.php"?>

</body>
</html>