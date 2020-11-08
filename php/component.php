<?php

function component($nomproduit, $prixproduit, $imageproduit,$idproduit){
    $element="

    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$imageproduit\" alt=\"bombes de bain\" class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$nomproduit</h5>
                    <h6>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"far fa-star\"></i>
                    </h6>
                    <p class=\"card-text\">
                        Exemple de texte
                    </p>
                    <h5>
                        <small><s class=\"text-secondary\">4,50 €</s></small>
                        <span class=\"price\">$prixproduit €</span>
                    </h5>
                    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"ajouter\">Ajouter au panier <i class=\"fas fa-shopping-cart\"></i></button>
                    <input type=\"hidden\" name=\"id_produit\" value=\"$idproduit\">
                </div>
            </div>
        </form>
    </div>";
    echo $element;
}

function elementPanier($imageproduit, $nomproduit, $prixproduit, $idproduit)
{
    $element= "
    <form action=\"panier.php?action=remove&id=$idproduit\" method=\"post\" class=\"items-panier\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3 pl-0\">
                                    <img src=$imageproduit alt=$nomproduit class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$nomproduit</h5>
                                    <small class=\"text-secondary\">Vendeur : Pedro</small>
                                    <h5 class=\"pt-2\">$prixproduit €</h5>
                                    <button type=\"submit\" class=\"btn btn-warning\">Sauvegarder pour plus tard</button>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Supprimer</button>
                                </div>
                                <div class=\"col-md-3 py-5\">
                                    <div>
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
    ";
    echo $element;
}

?>