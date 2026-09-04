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
        
        $crdu = $this->remplissage();
        
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
        $crdu = $this->nettoyageTable("IngredientPlat");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->nettoyageTable("RepasPlat");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->nettoyageTable("Plat");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->nettoyageTable("Repas");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->nettoyageTable("Moment");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->nettoyageTable("Ingredient");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->nettoyageTable("Unite");
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
    private function nettoyageTable($table) {
        global $CXO;
        
        $requete = "delete from $table where id > 0";
        
        $rlt = $CXO->executeRequete($requete);
        
        $crdu = $rlt->getCompteRendu();
        
        return $crdu;
    }
    
    /**
     * 
     * @return LIB_CompteRendu Compte rendu
     */
    private function remplissage() {
        $crdu = $this->remplissageTableIngredient();
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->remplissageTableUnite();
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->remplissageTableMoment();
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->remplissageTablePlat();
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->remplissageTableIngredientPlat();
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->remplissageTableRepasPlat();
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
    /**
     * @global LIB_DistributeurObjetTable $DOT
     * @return LIB_CompteRendu Compte rendu
     */
    private function remplissageTableIngredient() {
        global $DOT;
        
        $crdu = $this->creeElement("Ingredient", "Farine");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Ingredient", "Oeuf");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Ingredient", "Sucre");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Ingredient", "Lait");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Ingredient", "Eau");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Ingredient", "Sel");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Ingredient", "Levure chimique");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Ingredient", "Sucre vanillé");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
    /**
     * @global LIB_DistributeurObjetTable $DOT
     * @return LIB_CompteRendu Compte rendu
     */
    private function remplissageTableMoment() {
        global $DOT;
        
        $crdu = $this->creeElement("Moment", "Midi");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Moment", "Soir");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Moment", "Petit déjeuner");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("Moment", "Goûter");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
    /**
     * @global LIB_DistributeurObjetTable $DOT
     * @return LIB_CompteRendu Compte rendu
     */
    private function remplissageTableUnite() {
        global $DOT;
        
        $crdu = $this->creeElement("Unite", "Pièce");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "cl");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "ml");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "l");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "kg");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "g");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "Sachet");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "Cuiller à soupe");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "Cuiller à café");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Unite", "Pincée");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
    /**
     * @global LIB_DistributeurObjetTable $DOT
     * @return LIB_CompteRendu Compte rendu
     */
    private function remplissageTablePlat() {
        global $DOT;
        
        $crdu = $this->creeElement("Plat", "Gaufre moelleuse","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Frites","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Courgettes rondes avec chorizo et fromage","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Pizza aux miettes de poulet","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Melon jambon","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Soupe de Printemps","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Travers de porc avec pommes de terre","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Travers de porc et légumes","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Poisson et riz et légumes","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Salade de concombre et tomate au yaourt","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Sardines + Pommes de terre + Salade","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Pâtes aux légumes","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Tagliatelles de Sarrazin + Truite fumée","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Crêpes + Salade","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Omelette + Salade","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Tarte de pommes de terre","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Gaufre salée","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = $this->creeElement("Plat", "Rouleau de courgettes + Feta + Tomate","-");
        if ($crdu->isKo()) {
            return $crdu;
        }
                
        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
    /**
     * @global LIB_DistributeurObjetTable $DOT
     * @return LIB_CompteRendu Compte rendu
     */
    private function remplissageTableIngredientPlat() {
        global $DOT;
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Farine",300,"g");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Oeuf",1,"Pièce");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Beurre",75,"g");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Lait",150,"ml");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Eau",150,"ml");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Sel",1,"Cuiller à café");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Levure chimique",1,"Sachet");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Gaufre moelleuse","-","Sucre vanillé",1,"Sachet");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Steak","-","Entrecôte",200,"g");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = $this->creeElement("IngredientPlat", "Frites","-","Pomme de terre",3,"Pièce");
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
    /**
     * @global LIB_DistributeurObjetTable $DOT
     * @return LIB_CompteRendu Compte rendu
     */
    private function remplissageTableRepasPlat() {
        global $DOT;
        
        $crdu = $this->creeElement("RepasPlat","Gaufre moelleuse","-","04-09-2026","Goûter");
        if ($crdu->isKo()) {
            return $crdu;
        }

        $crdu = $this->creeElement("RepasPlat","Steak","-","05-09-2026","Soir");
        if ($crdu->isKo()) {
            return $crdu;
        }

        $crdu = $this->creeElement("RepasPlat","Frites","-","05-09-2026","Soir");
        if ($crdu->isKo()) {
            return $crdu;
        }

        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
    /**
     * @global LIB_DistributeurObjetTable $DOT
     * @return LIB_CompteRendu Compte rendu
     */
    private function creeElement() {
        global $DOT;
        
        $args = func_get_args();
        
        if (func_num_args() <= 1) {
            $crdu = new LIB_CompteRendu(false, "Pas assez de paramètres pour 'creeElement'");
            return $crdu;
        }
        
        $table = $args[0];

        $c = $DOT->getObjet($table);
        $c->set(...array_slice($args,1));
        $crdu = $c->sauve();
        if ($crdu->isKo()) {
            return $crdu;
        }
        
        $crdu = new LIB_CompteRendu(true, "");
        return $crdu;
    }
    
}

