                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';

class ControleurPraticiens extends ControleurSecurise {
    //Modélisation d'un praticien
    private $praticien; 
    private $typePraticien;
    
    public function __construct() {
        $this->praticien = new Praticien();
        $this->typePraticien = new TypePraticien();
    }
    
    // Affiche la liste des praticiens
    public function index($constraint = "") {
        
        if ($constraint == "") {
            $praticiens = $this->praticien->getPraticiens();
        }
        else 
        {
            $praticiens = $constraint;
        }
        $this->genererVue(array('praticiens' => $praticiens), "index");
    }
    
    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }
    
     // Affiche l'interface de recherche de praticien
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens();
        $typePraticiens = $this->typePraticien->getTypesPraticien();
        $this->genererVue(array('praticiens' => $praticiens, 'typePraticiens' => $typePraticiens));
    }

    // Affiche le résultat de la recherche de praticien
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    public function resultats() {
        if ($this->requete->existeParametre("idType") && $this->requete->existeParametre("ville") && $this->requete->existeParametre("idType")) {
            $idTypePraticien = $this->requete->getParametre("idType");
            
            $praticiens = $this->praticien->getPraticiensTypee($idTypePraticien);
            $this->index($praticiens);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    
}

?>
