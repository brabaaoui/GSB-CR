<?php
require_once 'Framework/Modele.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompteRendu
 *
 * @author braba
 */
class CompteRendu extends Modele {
    
    private $sqlComptesRendus = 'SELECT id_rapport as idRapport, RV.id_praticien, nom_praticien as nomPraticien, ville_praticien as villePraticien, date_rapport as date, bilan, motif 
        FROM rapport_visite RV JOIN praticien PR ON PR.id_praticien=RV.id_praticien';
    
    public function ajouterCompteRendu($praticien, $idVisiteur, $dateRapport, $motif, $bilan) {
        $sql = 'insert into RAPPORT_VISITE(id_praticien, id_visiteur, date_rapport, motif, bilan)'
            . ' values(?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($praticien, $idVisiteur, $dateRapport, $motif, $bilan));
    }
    
    public function getCompteRendu()
    {
        return $this->executerRequete($this->sqlComptesRendus);
    }
    
    
}

?>
