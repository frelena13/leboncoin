<?php

class AnnoncesManager {

    private $oDB;

//création del la connexion à la bdd comme objet PDO
    public function __construct(PDO $oDB) {
        $this->oDB = $oDB;
    }

// On costruit les champs du db, il recupere (fetch) les lignes du bd sql
    public function getList() {
        $oData = $this->oDB->query('SELECT * FROM annonces');

        $aList = array();
        while ($aLine = $oData->fetch(PDO::FETCH_ASSOC)) {
            $oAnnonce = new Annonce($aLine);
            $aList[] = $oAnnonce; // la tab de donné devient un objet grace à la function hydrate (dans class_annonce)
        }

        /* En PHP natif pour MySQL:
          $oData = mysql_query('SELECT * FROM annonces');
          $aList = array();
          while ($aLine = mysql_fetch_array($oData)) {
          $oAnnonce = new Annonce($aLine);
          $aList[] = $oAnnonce; // la tab de donné devient un objet grace à la function hydrate (dans class_annonce)
          }
         */
        return $aList;
    }

    public function get($iId) {

        $oData = $this->oDB->query('SELECT * FROM annonces WHERE id = ' . $iId);
        $aLine = $oData->fetch(PDO::FETCH_ASSOC);

        /*  En PHP natif pour MySQL:
          $oData = mysql_query('SELECT * FROM annonces WHERE id = ' . $iId);
          $aLine = mysql_fetch_array($oData);
         */

        return new Annonce($aLine);
    }

    public function insert(Annonce &$oAnnonce) {
        $sSQL = 'INSERT INTO Annonces (title, description, picture, price) VALUES (:title, :description, :picture, :price)';
        // on utlise les 2 points dans values mais on pourrait utiliser # ou autre
        $oStmt = $this->oDB->prepare($sSQL);
        $oStmt->bindValue(':title', $oAnnonce->getTitle(), PDO::PARAM_STR);
        $oStmt->bindValue(':description', $oAnnonce->getDescription(), PDO::PARAM_STR);
        $oStmt->bindValue(':picture', $oAnnonce->getPicture(), PDO::PARAM_STR);
        $oStmt->bindValue(':price', $oAnnonce->getPrice(), PDO::PARAM_STR);
        $oStmt->execute();

        $oAnnonce->setId($this->oDB->lastInsertId());

        /*  En PHP natif pour MySQL:
          $sTitle = mysql_escape_string($oAnnonce->getTitle());
          $sDescription = mysql_escape_string($oAnnonce->getDescription());
          $picture = mysql_escape_string($oAnnonce->getPicture());
          $price = mysql_escape_string($oAnnonce->getPrice());
          //$created_date = mysql_escape_string($oAnnonce->getCreatedDate());

          $sSQL = 'INSERT INTO Annonces '
          . ' (title, description, picture, price) '
          . 'VALUES ('
          . '"' . $sTitle . '", "' . $sDescription . '", "' . $picture . '", "' . $price . '")';
          $oData = mysql_query($sSQL);
          $oAnnonce->setId(mysql_insert_id());
         *
         */
    }

    public function update(Annonce $oAnnonce) {

        $oStmt = $this->oDB->prepare('UPDATE Annonces SET title = :title, description= :description, picture= :picture, price= :price WHERE id = ' . $oAnnonce->getId());
        $oStmt->bindValue(':title', $oAnnonce->getId(), PDO::PARAM_STR);
        $oStmt->bindValue(':description', $oAnnonce->getDescription(), PDO::PARAM_STR);
        $oStmt->bindValue(':picture', $oAnnonce->getPicture(), PDO::PARAM_STR);
        $oStmt->bindValue(':price', $oAnnonce->getPrice(), PDO::PARAM_STR);
        $oStmt->execute();
        $oAnnonce->setId($this->oDB->lastInsertId());

        /* En PHP natif pour MySQL:
          $sTitle = mysql_escape_string($oAnnonce->getTitle());
          $sDescription = mysql_escape_string($oAnnonce->getDescription());
          $picture = mysql_escape_string($oAnnonce->getPicture());
          $price = mysql_escape_string($oAnnonce->getPrice());

          $sSQL = 'UPDATE Annonces SET '
          . ' title = "' . $sTitle . '",'
          . ' description= "' . $sDescription . '", '
          . ' picture = "' . $picture . '", '
          . ' price = "' . $price . '" '
          . ' WHERE id = ' . $oAnnonce->getId();

          $oData = mysql_query($sSQL);
         */
    }

    public function delete(Annonce $oAnnonce) {
        $oStmt = $this->oDB->prepare('DELETE FROM annonces WHERE id = :id ');
        $oStmt->bindValue(':id', $oAnnonce->getId(), PDO::PARAM_INT);
        $oStmt->execute();

        /* En PHP natif pour MySQL:
          $oData = mysql_query('DELETE FROM annonces WHERE id = ' . $oAnnonce->getId());
          print_r(mysql_error());
         */
    }

}
