<?php
    include('config.php');
    if(isset($_GET['deletid']))
    {
        $id=$_GET['deletid'];
        $sql="DELETE FROM produit WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            header('location:list_produite.php');
        }
    }
?>