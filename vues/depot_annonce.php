<!-- On définie la méthode pour recevoir nos données, ici POST
Du coup, les données du formulaire seront récupérées en PHP via la variable $_POST -->
<?php
if ($_SESSION['bIsConnected']) {
    ?>
    <form id = "depot" method = "POST" enctype = "multipart/form-data">

        <input type = "text" id = "title" name = "title" placeholder = "Titre" /><br />

        <textarea rows = "10" id = "description" name = "description" placeholder = "Description"></textarea><br />

        <input type = "text" id = "price" name = "price" placeholder = "Prix en euros" /><br />

        <input type = "file" id = "image" name = "image" ><br />

        <input type = "submit" name = "annonceForm" value = "Créer" /> <!--envoie à php directement -->

    </form>
    <?php
} else {
    echo 'Veuillez vous connecter pour acceder à ce service';
}
?>