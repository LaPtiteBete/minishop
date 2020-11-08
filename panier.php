<?php

// Démarrer la session
session_start();
require_once ("php/CreateDb.php");
require_once ("php/component.php");

// Créer l'instance CreateDb class
$db = new CreateDb("minishsop","minishop_produits");

if(isset($_POST['remove']))
{
    //// print_r($_GET['id']);
    if($_GET['action'] == 'remove')
    {
        foreach ($_SESSION['panier'] as $key => $value)
        {
            if($value["id_produit"] == $_GET['id'])
            {
                unset($_SESSION['panier'][$key]);
                echo "<script>alert('Le produit a été supprimé de votre panier.)</script>";
                echo "<script>window.location = 'panier.php'</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Panier</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <link rel="stylesheet" href="styles.css">

    </head>
    <body class="bg-light">

    <?php
        require_once ("php/header.php");
    ?>

    <div class="container-fluid">
        <div class="row-px-5">
            <div class="col-md-7">
                <div class="panier">
                    <h6>Mon panier</h6>
                    <hr>

                    <?php
                    $total = 0;
                        if(isset($_SESSION['panier']))
                        {
                            $product_id = array_column($_SESSION['panier'], 'id_produit');

                            $result = $db->getData();
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                foreach ($product_id as $id)
                                {
                                    if ($row['id_produit'] == $id)
                                    {
                                        elementPanier($row['image_produit'], $row['nom_produit'], $row['prix_produit'], $row['id_produit']);
                                        $total = $total + (int)$row['prix_produit'];
                                    }
                                }
                            }
                        }
                        else
                        {
                            echo "<h5>Votre panier est vide.</h5>";
                        }
                    ?>
                    
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>Détail des prix</h6>
                    <hr>
                    <div class="row details-prix">
                        <div class="col-md-6">
                            <?php
                                if(isset($_SESSION['panier']))
                                {
                                    $count = count($_SESSION['panier']);
                                    echo "<h6>Prix ($count articles)</h6>";
                                }
                                else
                                {
                                    echo "<h6>Prix (0 article)</h6>";
                                }
                            ?>
                            <h6>Frais de livraison</h6>
                            <hr>
                            <h6>Montant total</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>
                                <?php
                                    echo $total . " €";
                                ?>
                            </h6>
                            <h6 class="text-success">OFFERTS</h6>
                                <hr>
                                <?php
                                    echo $total . " €";
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>