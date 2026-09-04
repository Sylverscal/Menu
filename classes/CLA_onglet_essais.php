<?php // content="text/plain; charset=utf-8"
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of COU_essais
 * 
 * Pour faire des essais d'affichages
 *
 * @author sylverscal
 */
        
class CLA_onglet_essais extends CLA_onglet_principal {

    private $db;
    
    /**
     * Affiche la page d'accueil
     */
    #[\Override]
    /**
     * 
     * @global LIB_BDD $CXO
     * @global LIB_BDD_Structure $CXO_ST
     * @global LIB_DistributeurObjetTable $DOT
     * @return type
     */
    final function affiche() {
        global $CXO;
        global $CXO_ST;
        global $DOT;
        
        $this->fonction("Foo","Gasp","Arf","Ourgl","Ventre saint gris","Scrongeugneu");
        
        
        return;
    }
    
    private function fonction($p1,$arguments) {
        $args = func_get_args();
        
        print_r($args);
        
        if (func_num_args() > 1) {
            $psansp1 = array_slice($args, 1);
            
            $this->deuxiemeFonction(...$psansp1);
        }
    }
    
    private function deuxiemeFonction($parametres) {
        $args = func_get_args();
        
        print_r($args);
    }
}
