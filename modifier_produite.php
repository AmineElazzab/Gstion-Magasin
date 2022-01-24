<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
    include('config.php');

    $id=$_GET['updateid'];

    $sqlreq="SELECT * FROM produit WHERE id=$id";
    
    $resl=mysqli_query($conn,$sqlreq);
    $row=mysqli_fetch_assoc($resl);

    $nom=$row['nom'];
    $cat=$row['categorie'];
    $prix=$row['prix'];
    $des=$row['descriptio'];
    $im=$row['imag'];
    // $im=$_FILES['imag'];



    if(isset($_POST['submit']))
    {
        $nom=$_POST['nom'];
        $cate=$_POST['cate'];
        $prix=$_POST['prix'];
        $desc=$_POST['desc'];
        $img=$_POST['img'];


        $sql="UPDATE produit SET nom='$nom',descriptio='$cate',prix=$prix,imag='$img',categorie='$cate' WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            // echo "<script>alert('yes');</script>";
            header('location:list_produite.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produite</title>
    <link rel="stylesheet" href="css/modifier_style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                    <a href="Add_Product.php">
                        <span class="las la-clipboard-list"></span>
                        <span>Ajouter un Produit</span>
                    </a>
                </li>
                <li>
                    <a href="Add_Product.php" class="active">
                        <span class="las la-edit"></span>
                        <span>Modifier un Produit</span>
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

    <!-- Main -->
    <div class="con">
        <div class="contain">
            <div class="contact-box">
                <form method="post" action="">
                    <input name="nom" type="text" placeholder="Nom" class="field" value=<?php echo $nom;?>>
                    <input name="cate" type="text" placeholder="Catégorie" class="field" value=<?php echo $cat;?>>
                    <input name="prix" type="number" placeholder="Prix" class="field" value=<?php echo $prix;?>>
                    <textarea name="desc" placeholder="Description" class="field" ><?php echo $des;?></textarea>
                    <div class="div_fill">
                        <p id="text">Choisire une image</p>
                        <input name="img" type="file" id="btn_envira" accept="image/*" value=<?php echo "C:xampp/htdocs/Actuel/img".$im;?>>
                    </div>
                    
                    <button type="submit" name="submit" >Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <!--End Main-->

</body>
</html>
