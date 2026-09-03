<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of COU_InitialisationBase
 * 
 * Actions pour charger la base en données pour la période des tests
 *
 * @author sylverscal
 */
class CLA_InitialisationBase {
    public function affiche_bloc() {
        $this->affiche_entete();
        
        $this->affiche_corps();
    }
    
    private function affiche_entete() {
        ?>
            <div class="w3-container w3-light-blue">
                <h2>Initialisation de la base</h2>
            </div>
        <?php
    }
    
    private function affiche_corps() {
        ?>
            <div class="w3-container w3-pale-blue">
                <h3><button class="w3-button w3-blue w3-block" id="BTN_LANCE_INITIALISATION_BASE">Lance le crabouillage apocalyptique</button></h3>
                <div class="w3-panel w3-danger">
                    <h4>DANGER !</h4>
                    <img src="https://menu:8890/image/girophare.gif" class="w3-round" alt="AU SECOURS !"> 
                    <p>Toutes les anciennes données vont être écrasées.</p>
                </div>             
            </div>
        <?php
    }
       
    /**
     * 
     * @global LIB_BDD $CXO
     * @return LIB_CompteRendu Compte rendu
     */
    public function crabouillageGeneral() {
        
        $crdu = new LIB_CompteRendu(true, "C'est du BSA extra piste");
        
        $crdu = $this->nettoyage();
        
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        return $crdu;
    }
    
    /**
     * 
     * @return LIB_CompteRendu Compte rendu
     */
    private function nettoyage() {
        $crdu = $this->nettoyageTableIngredient();
        
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        return $crdu;
    }
    
    /**
     * 
     * @global LIB_BDD $CXO
     * @return LIB_CompteRendu Compte rendu
     */
    private function nettoyageTableIngredient() {
        global $CXO;
        
        $requete = "delete from Ingredient where id > 0";
        
        $rlt = $CXO->execute($requete);
        
        $crdu = $rlt->getCompteRendu();
        
        return $crdu;
    }
    
}

