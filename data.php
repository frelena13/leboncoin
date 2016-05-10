
<?php

/** $aAnnoncesSide = Annonce::load();
  $aAnnonces = Annonce::load();
 */
/**

  $mesAnnonces = array ();

  file_put_contents ('data/annonce001.txt', serialize ($oAnnonce1));
  ... pour les 4 annonces - après on peut effacer et faire unserialize dans un tableau (boucle avec glob):

  foreach (glob('data/annonce*') as $sFilepath){

  $mesAnnonces[]= unserialize(file_get_contents($sFilepath));

  }




  $oAnnonce1 = new Annonce ();
  $oAnnonce1->setTitle('Fraises');
  $oAnnonce1->setPrice('20');
  $oAnnonce1->setImage('images/product_aside1.jpg');

  $oAnnonce2 = new Annonce ();
  $oAnnonce2->setTitle('Framboises');
  $oAnnonce2->setPrice('20');
  $oAnnonce2->setImage('images/product_aside1.jpg');

  $oAnnonce3 = new Annonce ();
  $oAnnonce3->setTitle('Abricots');
  $oAnnonce3->setPrice('40');
  $oAnnonce3->setImage('images/product_aside1.jpg');

  $mesAnnoncesAside=array();
  $mesAnnoncesAside[]=$oAnnonce1;
  $mesAnnoncesAside[]=$oAnnonce2;
  $mesAnnoncesAside[]=$oAnnonce3;

 */
?>