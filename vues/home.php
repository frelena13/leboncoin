<?php
$aAnnonces = $oAnnManager->getList();
$aAnnoncesSide = $oAnnManager->getList();
?>
<section>
    <select>
        <option>Fleurs</option>
        <option>Fruits</option>
        <option>Plantes</option>
    </select>
    <select>
        <option>PACA</option>
        <option>Rhone-Alpes</option>
        <option>Ile de France</option>
    </select>
    <select>
        <option>Bouches du Rhone</option>
        <option>Var</option>
        <option>Vaucluse</option>
    </select>
    <br />
    <input type="text" placeholder="Ville ou code postal" />
    <br />
    <input type="submit" value="Chercher" />
</section>

<!-- On utilise la nouvelle balise HTML5 "aside" pour indiquer un "panneau latéral" à notre site -->
<aside>
    <h2>Les bonnes affaires</h2>
    <?php
    foreach ($aAnnoncesSide as $oAnnonce) {
        echo'<article class="annaside">';
        echo '<img src="userfiles/' . $oAnnonce->getPicture() . '" class="image-aside" alt="bulbes"/>';
        echo'<div>';
        echo'<p class="nomProduit">' . $oAnnonce->getId() . ' ' . $oAnnonce->getTitle() . '</p>';
        echo'<p class="prixProduit">' . $oAnnonce->getPrice() . '</p>';
        echo'<br>';
        echo'</article>';
    }
    ?>

</aside>
<section id="centrale">
    <h1>ANNONCES</h1>
    <?php
    foreach ($aAnnonces as $oAnnonce) {
        echo '<a href="index.php?page=detail_annonce&id=' . $oAnnonce->getId() . '">';
        echo'<article class="main">';
        echo '<img src="userfiles/' . $oAnnonce->getPicture() . '" class="image" alt="bulbes"/>';
        echo'<div>';
        echo'<p class="nomProduit">' . $oAnnonce->getId() . ' ' . $oAnnonce->getTitle() . '</p>';
        echo'<p>' . substr($oAnnonce->getDescription(), 0, 100) . '</p>';
        echo'<p class="prixProduit">' . $oAnnonce->getPrice() . '</p>';
        echo'</div>';
        echo'</article>';
    }
    ?>
</section>