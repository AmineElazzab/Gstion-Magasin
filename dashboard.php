<?php 
include('config.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
    $sql="SELECT * FROM produit";
    $res=$conn->query($sql);
    $row=mysqli_num_rows($res);

    $sqlreq="SELECT * FROM user";
    $resq=mysqli_query($conn,$sqlreq);
    // $resq=$conn->query($sqlreq);
    $roww=mysqli_num_rows($resq);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DashBoard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> <span>IL MEGLIO</span></h2>
        </div>

        <div class="sidebare-menu">
            <ul>
                <li>
                    <a href="dashboard.php" class="active">
                        <span class="las la-igloo"></span>
                        <span>DashBoard</span>
                    </a>
                </li>
                <li>
                    <a href="list_produite.php">
                        <span class="las la-shopping-bag"></span>
                        <span>List des Produit</span>
                    </a>
                </li>
                <li>
                    <a href="Add_Product.php">
                        <span class="las la-clipboard-list"></span>
                        <span>Ajouter un Produit</span>
                    </a>
                </li>
                <li>
                    <a href="search.php">
                        <!-- <i class="las la-search"></i> -->
                        <span class="las la-search"></span>
                        <span>chercher un produit</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>


    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="user-wrapper">
                <img src="img/golden.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Mohammed</h4>
                    <a href="logout.php"><small>Déconexion</small></a>
                </div>
            </div>

        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php echo $roww;?></h1>
                        <span>Utilisateur</span>
                    </div>
                    <div>
                        <span class="las la-user-circle"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php echo $row;?></h1>
                        <span>Produite</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>