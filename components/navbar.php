<?php 
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$root_url = 'http://' . $_SERVER['SERVER_NAME'];

$arr_url = explode("/", $url);
unset($arr_url[sizeof($arr_url)-1]);
$new_url = implode("/",$arr_url);

?>

<nav style="border-radius: 10px; top: 5px;" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#"><i class="fas fa-school fa-2x"></i></a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        
                        <?php 
                        if (strpos($url,'/') !== false) {
                            echo '<li class="nav-item active ">';
                            echo '<a class="nav-link" href="#">Home</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="#">Home</a>';
                            echo '</li>';
                        }?>
                        <?php 
                        if (strpos($url,'tws') !== false) {
                            echo '<li class="nav-item active">';
                            echo '<a class="nav-link" href="pages/tws.php">TWS</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="pages/tws.php">TWS</a>';
                            echo '</li>';
                        }?> 
                        <?php 
                        if (strpos($url,'zadania') !== false) {
                            echo '<li class="nav-item active">';
                            echo '<a class="nav-link" href="pages/zadania.php">Zadania</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="pages/zadania.php">Zadania</a>';
                            echo '</li>';
                        }
                        if(isset($_SESSION['loggedin'])){
                            if (strpos($url,'vysledky') !== false) {
                                echo '<li class="nav-item active">';
                                echo '<a class="nav-link" href="pages/vysledky.php">Výsledky</a>';
                                echo '</li>';
                            } else {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="pages/vysledky.php">Výsledky</a>';
                                echo '</li>';
                            }
                            if (strpos($url,'download') !== false) {
                                echo '<li class="nav-item active">';
                                echo '<a class="nav-link" href="pages/download.php">Na stiahnutie</a>';
                                echo '</li>';
                            } else {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="pages/download.php">Na stiahnutie</a>';
                                echo '</li>';
                            }
                        } else {
                            echo "";
                        }
                        ?>   
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <?php 
                        if(isset($_SESSION['loggedin'])){
                            echo "<a href='pages/profile.php'><span style='color: white'> Moja zóna: ";
                            echo $_SESSION['loggedin'];
                            echo " <i class='fas fa-user-check'></i></span></a>";
                            echo '<a href="pages/logout.php" style="margin: 20px;" class="btn btn-success my-2 my-sm-0" type="submit">Log out <i class="fas fa-sign-in-alt"></i></a>';
                        } else {
                            echo '<a href="pages/login.php" style="margin: 20px;" class="btn btn-success my-2 my-sm-0" type="submit">Login <i class="fas fa-sign-in-alt"></i></a>';
                            echo '<a href="pages/register.php" class="btn btn-primary my-2 my-sm-0" type="submit">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a>';
                        }
                        ?>
                        

                    </form>
                </div>
            </nav>