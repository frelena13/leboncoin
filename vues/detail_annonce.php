<?php

//$oDetAnnonce = Annonce::getById($_GET['id']);
// cad :  j'appelle la function dans 1 class ~Annonce, je passe 1 parametre dans la function statique ~::getById, le param est composé d'une case d'un tableau ~:($_GET['id'])
$oDetAnnonce = $oAnnManager->get($_GET['id']);

if ($oDetAnnonce instanceof Annonce) {
    echo '<img src="userfiles/' . $oDetAnnonce->getPicture() . '" class="image" alt="bulbes"/>';
    echo'<div>';
    echo'<p class="nomProduit">' . $oDetAnnonce->getId() . ' ' . $oDetAnnonce->getTitle() . '</ br>';
    echo'<p class="nomProduit">' . $oDetAnnonce->getDescription() . '</p>';
    echo'<p class="prixProduit">' . $oDetAnnonce->getPrice() . '</ br>';
    echo'<a href="index.php?delete_ann=' . $oDetAnnonce->getId() . '">Supprimer</a></ br>';
} else {
    echo 'annonce invalide';
}
