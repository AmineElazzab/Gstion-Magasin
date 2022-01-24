<?php
    include('config.php');

    $id=$_GET['updateid'];
    echo $id;
    if(isset($_POST['submit']))
    {
        $nom=$_POST['nom'];
        $prix=$_POST['prix'];
        $cate=$_POST['cate'];
        $imag=$_POST['img'];

        $sql="UPDATE produit SET nom='$nom',prix=$prix,imag='$imag',categorie='$cate' WHERE id=$id";
        $res=mysqli_query($con,$sql);
        if($res)
            echo "<script>alert('Yes');</script>";
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>crud operation</title>
  </head>
  <body>
    <div class="container">
        <form method="post">
            <div class="form-group my-5">
                <label >Nom : </label>
                <input type="text" name="nom" class="form-control"  placeholder="Enter your name" >
            </div>
            <div class="form-group">
                <label >Prix : </label>
                <input type="number" name="prix" class="form-control"  placeholder="Enter Pric" >
            </div>
            <div class="form-group">
                <label >Catégorie : </label>
                <input type="text" name="cate" class="form-control"  placeholder="Enter your categorie" >
            </div>
            <!-- <div class="form-group">
                <label >Imag : </label>     
                <input type="password" name="pass" class="form-control"  placeholder="Enter your password" >
            </div> -->
            <div class="div_fill">
                    <!-- <label for="">Image</label> -->
                    <!-- <p id="text">telecharger image</p> -->
                    <input type="file" name="img" id="btn_envira">
                </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>
</html>