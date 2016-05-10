<?php

class Annonce {

    protected $id;
    protected $title;
    protected $description;
    protected $picture;
    protected $price;
    protected $created_date;

    // On utilise un attribut de classe ("static") (propre à notre référentiel Annonce)
    // pour gérer un ID automatique des annonces
    // public static $NB_ANNONCES;
    // On utilise une constante de classe ("const") (propre à notre référentiel Annonce)
    // pour gérer le répertoire de stockage de nos fichiers annonce
    // const DIR_ANNONCES = 'data/';

    public function __construct($aData = array()) {
        if ($aData) {
            $this->hydrate($aData);
        }
    }

    public function hydrate($aData) {
        $this->setId($aData['id']);
        $this->setTitle($aData['title']);
        $this->setDescription($aData['description']);
        $this->setPicture($aData['picture']);
        $this->setPrice($aData['price']);
        $this->setCreatedDate($aData['created_date']);
    }

    /*
      public function __construct() {
      self::$NB_ANNONCES++;
      $this->id = self::$NB_ANNONCES;
      }

      // On crée une méthode de classe ("static") (propre à notre référentiel Annonce)
      // pour charger nos annonces existantes (via unserialize)
      public static function load() {
      $aList = array();
      foreach (glob(self::DIR_ANNONCES . 'annonce*') as $sFilepath) {
      $aList[] = unserialize(file_get_contents($sFilepath));
      }

      // on force le nombre d'annonces par rapport au nombre de fichiers
      self::$NB_ANNONCES = count($aList);

      return $aList;
      }

      public static function getById($id) {
      $sFilename = 'annonce' . str_pad($id, 3, '0', STR_PAD_LEFT) . '.txt';
      if (file_exists(self::DIR_ANNONCES . $sFilename)) {
      $oDetAnnonce = unserialize(file_get_contents(self::DIR_ANNONCES . $sFilename));
      return $oDetAnnonce;
      }
      }

      // On crée une méthode de sauvegarde
      // pour enregistrer notre annonce (via serialize)
      public function save() {
      // on utilise str_pad pour convertir notre ID au format 0XX
      $sFilename = 'annonce' . str_pad($this->getId(), 3, '0', STR_PAD_LEFT) . '.txt';
      file_put_contents(self::DIR_ANNONCES . $sFilename, serialize($this));
      }

      /*
      On crée une fonction pour retourner la valeur 'lisible'
      de notre propriété oDate (de type DateTime)
     */

    public function getFormattedDate() {
        return $this->oDate->format('d/m/Y H:i');
    }

    /*
      Getteurs/Setters de nos propriétés
     */

    public function getId() {
        return $this->id;
    }

    public function setId($inewId) {
        $this->id = $inewId;
    }

    //public function setId($inewId) {
    //	$this->iId = $inewId;
    //}

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($sNewTitle) {
        $this->title = $sNewTitle;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($sNewDescription) {
        if (strlen($sNewDescription) > 0) {
            $this->description = $sNewDescription;
        }
    }

    public function getPicture() {
        return $this->picture;
    }

    public function setPicture($sNewImage) {
        if (strlen($sNewImage) > 0) {
            $this->picture = $sNewImage;
        }
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($iNewPrice) {
        if (strlen($iNewPrice) > 0) {
            $this->price = $iNewPrice;
        }
    }

    public function getCreatedDate() {
        return $this->created_date;
    }

    public function setCreatedDate($oNewDate) {
        if ($oNewDate instanceof DateTime) {
            $this->created_date = $oNewDate;
        }
    }

}

?>