<?php

// Démarrer la session
session_start();
require_once ('php/CreateDb.php');
require_once ('php/component.php');

// Créer l'instance CreateDb class
$database = new CreateDb($dbname="meuledefeqowc",$tablename="minishop_produits");

// Ajouter au panier
if(isset($_POST['ajouter']))
{
    /// print_r($_POST['id_produit']);
    if(isset($_SESSION['panier']))
    {
        /// print_r($_SESSION['panier']);
        $item_array_id = array_column($_SESSION['panier'], $column="id_produit");
        /// print_r($item_array_id);

        if(in_array($_POST['id_produit'], $item_array_id))
        {
            echo "<script>alert('Cet article a déjà été ajouté à votre panier. Vous pouver en modifier la quantité via votre panier.')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
        else
        {
            $count = count($_SESSION['panier']);
            $item_array = array(
                'id_produit' => $_POST['id_produit']
            );

            $_SESSION['panier'][$count] = $item_array;
            /// print_r($_SESSION['panier']);
        }
    }
    else
    {
        $item_array = array(
            'id_produit' => $_POST['id_produit']
        );

        // Créer une nouvelle variable de session
        $_SESSION['panier'][0] = $item_array;
        print_r($_SESSION['panier']);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Projet Solidaire</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <link rel="stylesheet" href="styles.css">

    </head>
    <body>

    <?php 
        require_once ("php/header.php");
    ?>

    <div class="container">
        <div class="row text-center py-5">

        <!-- Ajout d'éléments dans la base de données grâce à une requête SQL :
        
        INSERT INTO produits_tb (nom_produit, prix_produit, image_produit) VALUES
        ("Bombes de bain", 5.50, "uploads/produit_1.jpg"),
        ("Bougies artisanales", 9.90, "uploads/produit_2.jpg"),
        ("Bijoux en perles", 14.90, "uploads/produit_3.jpg"),
        ("T-shirt enfant", 20.00, "uploads/produit_4.jpg")
        -->
            <?php
                $result = $database->getdata();
                while ($row = mysqli_fetch_assoc($result))
                {
                    component($row['nom_produit'], $row['prix_produit'], $row['image_produit'],$row['id_produit']);
                }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    </body>
</html>