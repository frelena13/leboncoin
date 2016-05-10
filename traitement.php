<?php

// fichier avec tous les traitements de formulaire
if (isset($_GET['logout'])) {
    $_SESSION['oUtilisateur'] = NULL;
    unset($_SESSION);
    session_destroy();
    header('Location: index.php');
}

// traitement formulaire de connexion
// Par défault, on considère l'utilisateur NON connecté

if (!isset($_SESSION['oUtilisateur'])) {
    $_SESSION['oUtilisateur'] = NULL;

//En PHP natif pour MySQL:
//if (!isset($_SESSION['bIsConnected'])) {
    // $_SESSION['bIsConnected'] = false;
    // $_SESSION['sEmailConnected'] = NULL;
}

// Est-ce que le formulaire de connexion a été "soumis" ?
if (isset($_POST['loginForm'])) {
    $sEmailInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sPasswordInput = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Est-ce que les données sont cohérentes ?
    if ($sEmailInput && $sPasswordInput) {
        $oUser = $oUsersManager->getByEmailandPassword($sEmailInput, $sPasswordInput);
        if ($oUser instanceof User) {

            $_SESSION['oUtilisateur'] = $oUser;
            // $_SESSION['bIsConnected'] = true;
            // $_SESSION['sEmailConnected'] = $sEmailInput;
        }
    }
}
//traitement du tableau form POST
// Test : Est-ce que le formulaire de dépôt d'annonce a été "soumis" ?
if (isset($_POST['annonceForm'])) {

    $sTitleInput = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $sPriceInput = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $sDescriptionInput = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);


    //traitement de l'image
    $sImage = false;
    $aAllowedTypes = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
    if (isset($_FILES['image']) &&
            $_FILES['image']['error'] == UPLOAD_ERR_OK &&
            in_array($_FILES['image']['type'], $aAllowedTypes)) {
        $sImage = $_FILES['image']['tmp_name'];
    }
    print_r($_FILES);


    if ($sTitleInput && $sDescriptionInput && $sPriceInput && $sImage) {

        $oAnnonce = new Annonce();
        $oAnnonce->setTitle($sTitleInput);
        $oAnnonce->setDescription($sDescriptionInput);
        $oAnnonce->setPrice($sPriceInput);
        $oAnnonce->setCreatedDate(new Datetime('now'));

        $oAnnManager->insert($oAnnonce);


        // on s'occupe du fichier uploadé
        $sFileDest = 'img_' . $oAnnonce->getId() . '.png';
        if (move_uploaded_file($sImage, 'userfiles/' . $sFileDest)) {
            // Si le fichier a correctement été déplacé, on mémorise l'emplacement
            $oAnnonce->setPicture($sFileDest);
            // On sauvegarde notre objet Annonce
            //$oAnnonce->save();

            $oAnnManager->update($oAnnonce);
        }
    }
}

if (isset($_POST['contactForm'])) {
    $sEmailInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sObjectInput = filter_input(INPUT_POST, 'object', FILTER_SANITIZE_STRING);
    $sMessageInput = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($sEmailInput && $sObjectInput && $sMessageInput) {
        echo 'Email : ' . $sEmailInput . '<br />';
        echo 'Objet : ' . $sMessageInput . '<br />';
        $NewContactForm = new MessageContact($sEmailInput, $sObjectInput, $sMessageInput);
        $NewContactForm->send();
    }
}

if (isset($_GET['delete_ann'])) {
    $oAnnonce = new Annonce;
    $oAnnonce->setId($_GET['delete_ann']);
    $oDetAnnonce = $oAnnManager->delete($oAnnonce);
}