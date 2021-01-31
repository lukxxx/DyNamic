<?php 
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<nav style="border-radius: 10px; top: 5px;" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="../index.html"><i class="fas fa-school fa-2x"></i></a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        
                        <?php 
                        if (strpos($url,'#' || '') !== false) {
                            echo '<li class="nav-item active">';
                            echo '<a class="nav-link" href="../index.php">Home</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="../index.php">Home</a>';
                            echo '</li>';
                        }?>
                        <?php 
                        if (strpos($url,'tws') !== false) {
                            echo '<li class="nav-item active">';
                            echo '<a class="nav-link" href="tws.php">TWS</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="tws.php">TWS</a>';
                            echo '</li>';
                        }?> 
                        <?php 
                        if (strpos($url,'zadania') !== false) {
                            echo '<li class="nav-item active">';
                            echo '<a class="nav-link" href="zadania.php">Zadania</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="zadania.php">Zadania</a>';
                            echo '</li>';
                        }?>   
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a href="../pages/login.php"><button style="margin: 20px;" class="btn btn-success my-2 my-sm-0" type="submit">Login <i class="fas fa-sign-in-alt"></i></button></a>
                        <a href="../pages/register.php"><button class="btn btn-primary my-2 my-sm-0" type="submit">Register <i class="fa fa-user-plus" aria-hidden="true"></i></button></a>
                    </form>
                </div>
            </nav>