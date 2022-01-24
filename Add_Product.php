<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include('config.php');



    if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['categorie'])  && isset($_POST['description'] ) && isset($_POST['image']))
    {
        if(!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['categorie']) && !empty($_POST['description']) && !empty($_POST['image']))
        {
            $nom=$_POST['nom'];
            $prix=$_POST['prix'];
            $categorie=$_POST['categorie'];
            $desc=$_POST['description'];
            $img=$_POST['image'];


            $sql="INSERT INTO produit(nom,prix,categorie,descriptio,imag) VALUES('$nom',$prix,'$categorie','$desc','$img')";
            $conn->query($sql);
            // $res=mysqli_query($con,$sql);
            if($conn)
                header('location:list_produite.php');
        }
        else
        {
            echo "<script>alert('Remplire Tous les chams');</script>";
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/Add_Pr_style.css">
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
                    <a href="dashboard.php" >
                        <span class="las la-igloo"></span>
                        <span>DashBoard</span>
                    </a>
                </li>
                <li>
                    <a href="list_produite.php" >
                        <span class="las la-shopping-bag"></span>
                        <span>List des Produit</span>
                    </a>
                </li>
                <li>
                    <a href="Add_Product.php" class="active">
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
                <!-- Dashboard -->
            </h2>

            <div class="user-wrapper">
                <img src="img/golden.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Mohammed</h4>
                    <a href="logout.php"><small>Déconexion</small></a>
                </div>
            </div>
        </header>
    </div>

    <div class="con">
        <div class="contain">
            <div class="contact-box">
                <form method="POST" action="">
                    <input name="nom" type="text" class="field" placeholder="Nom" id="nom">
                    <input name="prix" type="number" class="field" placeholder="Prix" id="prix">
                    <input name="categorie" type="text" class="field" placeholder="Catégorie" id="Catégorie">
                    <!-- <select name="" id="" class="field">
                        <option value="">Select Categorie</option>
                    </select> -->
                    <textarea name="description" placeholder="Description" class="field" id="message"></textarea>

                    <div class="div_fill">
                        <p id="text">telecharger image</p>
                        <input type="file" name="image" id="btn_envira">
                    </div>
                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html