<?php
/**
 *  Affichage la vue qui permet de faire l'ajout d'un Etudiant
 * @return string le contenu de la vue
 */
function view_createEtd(){
    return require_once '../app/views/Etudiant/create.php';
}

/**
 * Intéragit avec le model pour créer un étudiant
 * Cette fonction extrait les données contenues dans $_POST puis appelle la fonction create du model pour,
 * faire l'ajout d'un Etudiant
 * @return void
 */
function storeEtd(){
    extract($_POST);
    createEtd($nomEtd,$pnomEtd,$emailEtd,$filiEtd);
    indexEtd();
}

/**
 * Sert d'index afin de pouvoir afficher les étudiants présent dans la base de données.
 * Elle fait appelle à la fonction readEtd pour que l'affichage soit fonctionnel
 * @return string le contenu de la vue
 */
function indexEtd(){
     $etudiants = readEtd();
     require_once '../app/views/Etudiant/index.php';
}

/**
 * Supprime un Etudiant.
 * Cette fonction intéragit avec le modèle en utilisant sa fonction delete afin de supprimer dans la base de données.
 * @param  int $id l'identifiant de l'étudiant dans la base
 * @return void
 */
function removeEtd($id){
    deleteEtd($id);
    indexEtd();
}

/**
 * Affiche la vue qui permet de modifier un Etudiant spécifique avec ces informations
 * @param $id l'identifiant unique de l'étudiant
 * @return string le contenu de la vue
 */
function viewEditEtd($id){
    $etd = getOneEtd($id);
    return require_once '../app/views/Etudiant/edit.php';
}

/**
 * Modifier un Etudiant en Intéragissant avec le modèle afin d'utiliser la fonction updateEtd pour faire la,
 * mise à jour dans la base de données
 * @return void
 */
function editEtudiant(){
    extract($_POST);
    updateEtd($nomEtd,$pnomEtd,$emailEtd,$filiEtd,$idEtd);
    indexEtd();
}