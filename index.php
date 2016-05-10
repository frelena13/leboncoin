<?php
session_start();
include_once ('class/class_annonce.php');
include_once ('class/class_annonce_manager.php');
include_once ('class/class_MessageContact.php');
include_once ('class/class_user_manager.php');
include_once ('class/class_user.php');

include_once ('functions.php');
//création objet PDO, l'instence de l'obj PDO que nous permet de communiquer avec la base
$oPDO = connectDB();
var_dump($oPDO);
$oAnnManager = new AnnoncesManager($oPDO);
$oUsersManager = new UsersManager($oPDO);

include_once ('traitement.php');
//include_once ('data.php');

logIP();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <title>Site de petites annonces - The Good Corner</title>
        <meta name="description" content="Site de petites annonces">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <?php include ('header.php'); ?>
        </header>

        <div id="ajaxVues">
            <?php
            $page = isset($_GET['page']) ? 'vues/' . $_GET['page'] . '.php' : NULL;

            if (!file_exists($page)) {
                $page = 'vues/home.php';
            }

            include($page);
            ?>
        </div>

        <footer>
            <?php include ('footer.php   '); ?>
        </footer>
    </body>
</html>
<?php
$date = date("d-m-Y");
$heure = date("H:i");
Print("Nous sommes le $date et il est $heure");


