<?php
session_start();
include_once ('class/class_annonce.php');
include_once ('data.php');
include_once ('functions.php');
include_once ('traitement.php');

	
	if (isset($_POST['action']) && $_POST['action'] == 'home')

		{
			echo 'Accueil ajax';
		include ('vues/home.php');
	}	
	else if (isset($_POST['action']) && $_POST['action'] == 'contact')
	{
			echo 'Contact ajax';
		include ('vues/contact.php');
	}

?>