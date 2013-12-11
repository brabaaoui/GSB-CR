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

    private $sqlSelectCR = 'SELECT id_rapport as idRapport, 
        RV.id_praticien, nom_praticien as nomPraticien, 
        ville_praticien as villePraticien, 
        date_rapport as date, bilan, motif 
        FROM rapport_visite RV JOIN praticien PR ON PR.id_praticien=RV.id_praticien';
    
    private $sqlInsertCR = 'insert into RAPPORT_VISITE(id_praticien, id_visiteur, date_rapport, motif, bilan) 
        values(?, ?, ?, ?, ?)';
    
    private $sqlDeleteCR = 'DELETE FROM RAPPORT_VISITE WHERE id_rapport=?';
    
    private $sqlUpdateCR = 'UPDATE rapport_visite 
        SET  motif=?, bilan=?
        WHERE id_rapport=?';

    public function ajouterCompteRendu($praticien, $idVisiteur, $dateRapport, $motif, $bilan) {
        $sql = $this->sqlInsertCR;
        $this->executerRequete($sql, array($praticien, $idVisiteur, $dateRapport, $motif, $bilan));
    }

    // Suppression
    public function deleteCompteRendu($idCompteRendu) {
        $sql = $this->sqlDeleteCR;
        $this->executerRequete($sql, array($idCompteRendu));
    }
    
    public function updateCompteRendu($motif, $bilan, $idCompteRendu) {
        $sql = $this->sqlUpdateCR;
        $this->executerRequete($sql, $array($motif, $bilan, $idCompteRendu));
    }

    public function getCompteRendu() {
        $sql = $this->sqlSelectCR;
        return $this->executerRequete($sql);
    }
    
    

}

?>
