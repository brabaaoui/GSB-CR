<?php

require_once 'Framework/Modele.php';


class Praticien extends Modele {
    // Requete SQL contenant l'ensemble des champs de la table praticien + lib_specialite de la table specialite
    private $sqlPraticien = 'SELECT PR.id_praticien as idPraticien, nom_praticien as nomPraticien, 
        prenom_praticien as prenomPraticien, adresse_praticien as adressePraticien, 
        cp_praticien as cpPraticien, ville_praticien as villePraticien, 
        coef_notoriete as coefNotoriete, lib_type_praticien as libTypePraticien
        FROM praticien PR JOIN type_praticien TY ON PR.id_type_praticien=TY.id_type_praticien';
    
    
        // Renvoie la liste des praticiens
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }
    
    public function getPraticiensTypee($constraint) {
        $sql = $this->sqlPraticien . " WHERE PR.id_type_praticien=" . $constraint . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }
    
  
    
        // Renvoie un praticien à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien  . ' where id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
    
  
    
}

?>
