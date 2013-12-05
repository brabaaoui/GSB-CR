<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypePraticien
 *
 * @author braba
 */
class TypePraticien extends Modele {
    
    private $sqlTypePraticien = 'SELECT id_type_praticien AS idTypePraticien, lib_type_praticien AS libTypePraticien FROM type_praticien';
    
    public function getTypesPraticien ()
    {
        $sql = $this->sqlTypePraticien;
        $typePraticiens = $this->executerRequete($sql);
        return $typePraticiens;
    }
}

?>
