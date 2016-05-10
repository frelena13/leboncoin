<?php

if (isset($_POST['contactForm']) && isset($_POST['email']) && isset($_POST['message'])) {
    $sEmailInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sObjectInput = filter_input(INPUT_POST, 'object', FILTER_SANITIZE_STRING);
    $sMessageInput = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    echo'<p class="nomProduit">' . $sObjectInput[] . '</ br>';
    echo'<p class="prixProduit">' . $sMessageInput[] . '</ br>';
}
