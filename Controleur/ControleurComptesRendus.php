<?php
require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/CompteRendu.php';
require_once 'Modele/Praticien.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurComptesRendus
 *
 * @author braba
 */
class ControleurComptesRendus extends ControleurSecurise {
    
    private $comptesRendus; 
    
    public function __construct() {
        $this->comptesRendus = new CompteRendu();
    }
    
    public function index() {
        $comptesRendus = $this->comptesRendus->getCompteRendu(); 
        $this->genererVue(array('comptesRendus' => $comptesRendus), "index");
    }
    
    public function ajout () {
        $praticien = new Praticien(); 
        $praticiens = $praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens), "ajout");
    }
    
    public function ajouter () {
        if ($this->requete->existeParametre("idPraticien") && $this->requete->existeParametre("motif") && $this->requete->existeParametre("date") && $this->requete->existeParametre("bilan")) {
            $idPraticien = $this->requete->getParametre("idPraticien");
            $motif = $this->requete->getParametre("motif");
            $bilan = $this->requete->getParametre("bilan");
            $date = $this->requete->getParametre("date");
            $idVisiteur = $this->requete->getSession()->getAttribut("idVisiteur");
            $this->comptesRendus->ajouterCompteRendu($idPraticien, $idVisiteur , $date, $motif, $bilan);
            $this->index();
            
        }
    }
}

?>
