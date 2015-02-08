<?php

namespace Application\Controllers;

/**
 *
 *
 */
class Recette extends \Library\Controller\Controller {
    
    /**
     *  Méthode __construct()
     *
     *  Constructeur par défaut appelant le constructeur de Library\Controller\Controller
     *
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     *  Méthode getrecettes($params)
     *
     *  Récupèrera un nombre donnée de recettes
     *       
     *  @param      array       $params     [données de requête]
     *  @return     array
     * 
     */
    public function getrecettes() {      //  obtenir toutes les recettes
        
        
        $modelRecette   = new \Application\Models\Recette('localhost');
        $recettes       = $modelRecette->fetchAll();
        if( empty($recettes[0]) ){
            $this->message->addError("aucune recette !");
        }

        return $this->setApiResult($recettes);
    }

    /**
     *  Méthode post($params)
     *
     *  Crée une recette avec les paramètres de la requête POST
     *       
     *  @param      array       $params     [données de requête]
     *  @return     array
     *
     */
    public function insertrecette($params) {         //ajouter une recette


        unset($params['method']);


        $modelRecette  = new \Application\Models\Recette('localhost');
        
        
        if($modelRecette->insert($params) ) {
            return $this->setApiResult(true);
        }else{
            return $this->setApiResult(false, true, "erreur pendant l'ajout");
        }


    }
    



}