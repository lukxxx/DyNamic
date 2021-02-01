<!DOCTYPE html>
<html lang="en">
<?php include "../components/head.php"; 
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
                <h1 class="display-4">Boli ste úspešne odhlásený!</h1>
                <p class="lead">Ďakujeme za návštevu</p>
                <hr class="my-4">
                <p>Prihláste sa znova hneď aby ste nič nezmeškali</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="../pages/login.php" role="button">Prihlásiť sa</a>
                </p>
            </div>
        </div>
        
    </main>
    <?php include "../components/footer.php"?>

</body>
</html>