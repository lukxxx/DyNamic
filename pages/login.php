<?php 
session_start();


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

$sth = $pdo->prepare("SELECT * FROM people");
$sth->execute();

$row = $sth->fetch(PDO::FETCH_ASSOC);
$menicko = $row['meno'];
$password = $row['hesielko'];

echo $password;
if(isset($_POST['bimbambum'])){
    if(empty($_POST['name'])){
        $error = "<div class='alert alert-danger' role='alert'>
        Nezadal si meno!
        </div>";
    } else if($_POST['name'] !== $menicko){
        $error = "<div class='alert alert-danger' role='alert'>
        Neexistuje žiaden účet s týmto menom
        </div>";
    } else {
        $error = "";
    }
    if(empty($_POST['password'])){
        $error_pass = "<div class='alert alert-danger' role='alert'>Nezadal si heslo!</div>";
    } else if(isset($_POST['password'])){
        $pass = $_POST['password'];
        if(password_verify($pass, $password)){
            $error_pass = ""; 
        } 
    }      
    } else {
        $error_pass = "<div class='alert alert-danger' role='alert'>Zlé heslo!</div>";
    }
    if($error == "" && $error_pass == ""){
        header("location:../index.php");
    }
    
    echo $password;
    echo $pass;


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
                <h2>Prihláste sa!</h2>
                <div style="padding: 5% 25% 0% 25%">
                    <form method="post" action="">
                        <label>Meno</label><input type="text" name="name" class="form-control">
                        <label>Heslo</label><input type="password" name="password" class="form-control">
                        <input type="submit" value="Prihlásiť sa" name="bimbambum" class="btn btn-success">
                    </form>
                </div>
                
            </div>
        </div>
        
    </main>
    <?php include "../components/footer.php"?>

</body>
</html>