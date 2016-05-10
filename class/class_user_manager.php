<?php

class UsersManager {

    private $oDB;

    //on passe en parametre cette valeur
    public function __construct(PDO $oDB) {
        $this->oDB = $oDB;
    }

    public function get($iId) {

        $oData = $this->oDB->query('SELECT * FROM users WHERE id = ' . $iId);
        $aLine = $oData->fetch(PDO::FETCH_ASSOC);
        if ($aLine) {
            return new User($aLine);

            /* En PHP natif pour MySQL:
             * $oData = mysql_query('SELECT * FROM users WHERE id = ' . $iId);
              $aLine = mysql_fetch_array($oData);
              if ($aLine) {
              return new User($aLine);
             *
             */
        }
    }

    public function getByEmailandPassword($email, $password) {

        $oData = $this->oDB->query('SELECT * FROM users WHERE email = "' . $email . '" AND password = "' . $password . '"');
        $aLine = $oData->fetch(PDO::FETCH_ASSOC);
        if ($aLine) {
            return new User($aLine);

            /* En PHP natif pour MySQL:

              $oData = mysql_query('SELECT * FROM users WHERE email = "' . $email . '" AND password = "' . $password . '"');
              $aLine = mysql_fetch_array($oData);
              if ($aLine) {
              return new User($aLine);
             *
             */
        }
    }

}
