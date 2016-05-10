<img src="images/bower-logo-petit.png" id="logo" alt="logo_le_bon_coin"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<?php
if ($oUser instanceof User) {
    //if ($_SESSION['bIsConnected']) {
    echo 'Tu es connecté';
    ?>
    <a href='index.php?logout'>Se deconnecter</a>

<?php } else { ?>
    <form id="connexion" method="POST">
        <input style="width:60%" type="email" name="email" placeholder="Email" required><br>
        <input style="width:60%" type="password" name="password" placeholder="Password" required><br>
        <input style="width:70%" type="submit" name="loginForm" value="Connexion">
    </form>
<?php } ?>

<?php
/* php va créer automatiquement ça $_GET=array(
  'email=> 'xxx'
  'Ppass' => 'xxx'
  'loginForm'=> 'se connecter')
 */
?>




<nav>
    <ul>
        <li><a href="index.php">ACCUEIL<a/></li>
        <li><a id="accaj" href="#">ACCUEIL AJAX<a/></li>
        <li><a href="index.php?page=depot_annonce">DEPOT ANNONCE<a/></li>
        <li>DEMANDES</li>
        <li><a href="index.php?page=contact">CONTACT<a/></li>
        <li><a id="contaj" href="#">CONTACT AJAX<a/></li>
    </ul>
</nav>

<script>

    $(document).ready(function () {
        $("#accaj").click(function () {
            $.ajax({
                async: true,
                url: "ajax.php",
                type: 'POST',
                data: "action=home",
                success: function (data) {
                    $('#ajaxVues').html(data);
                }
            });
        });


        $("#contaj").click(function () {
            $.ajax({
                async: true,
                url: "ajax.php",
                type: 'POST',
                data: "action=contact",
                success: function (data) {
                    $('#ajaxVues').html(data);
                }
            });
        });
    });

</script>