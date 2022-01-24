<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
    include('config.php');
    if(isset($_POST['submit']))
    {
        $nom=$_POST['nom'];
        $categorie=$_POST['categorie'];
        if(!empty($nom)&&!empty($categorie))
        {
            $sql="SELECT * FROM produit WHERE nom='$nom' AND categorie='$categorie'";
            $res=$conn->query($sql);
            $num=mysqli_num_rows($conn->query($sql));

        }
        else
            echo "<script>alert('Remplire Tous les donnes');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>chercher un produit</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="search_style.css">
    
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
                    <a href="search.php" class="active">
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
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Chercher un produit</h3>
                        </div>
                        <div class="con">
                            <div class="contact-box">
                                <form action="" method="post">
                                    <input name="nom" type="text" class="field" placeholder="Nom" id="nom">
                                    <input name="categorie" type="text" class="field" placeholder="Catégorie" id="email">
                                    <button type="submit" name="submit" >Chercher</button>
                                </form>
                            </div>
                        </div>
                                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="80%" class="content-table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th>Image</th>
                                            <th width="10px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($num))
                                            {
                                                if($num>0 )
                                                {
                                                    while($row=$res-> fetch_assoc())
                                                    {

                                                        ?>
                                                    
                                                        <tr >
                                                            <td data-label="Id"><?php echo $row["id"] ?></td>
                                                            <td data-label="Nom"><?php echo $row["nom"] ?></td>
                                                            <td data-label="Prix"><?php echo $row["prix"] ?></td>
                                                            <td data-label="Catégorie"><?php echo $row["categorie"] ?></td>
                                                            <td data-label="Image">
                                                                <img src= <?php  echo "img/".$row["imag"] ; ?> >
                                                            </td>
                                                            <td>
                                                                <span class="action_btn">
                                                                    <a href="modifier_produite.php?updateid=<?php echo $row['id']?>">Modifier</a><a href="delete.php?deletid=<?php echo $row['id'];?>">Supprimer</a>
                                                                </span>
                                                            </td>
                                                        </tr>
                                        <?php 
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<script>alert('Produit N'existe pas')</script>";
                                                }
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
               
            </div>
        </main>
    </div>
</body>
</html>