<?php
/**
 * Affichage la vue qui permet de faire l'ajout d'un cours
 * @return string le contenu de la vue
 */
function view_create(){
    return require_once '../app/views/cours/create.php';
}

/**
 * Sert de fonction d'indexation
 * cette fonction affichage les cours contenue dans la base de données en utilisant une des fonctions du model cours,
 * contenu dans le dossier models, elle retourne la vue charger d'afficher les données
 *
 * @return string le contenu de la vue
 */
function index(){
    $cours= read();
    return require_once '../app/views/cours/index.php';
}

/**
 * Valide la mise à jour des données
 * Cette fonction extrait les données contenues dans le tableau super global $_POST,
 * récupère les données soumises puis appelle la fonction update du modèle pour intéragir avec la base
 * Après mise à jour l'index est appelé pour l'affichage des données
 * utilise la fonction strtolower afin d'insérer des codes de cours uniquement en minuscule
 * @return void
 */
function validerUpdate(){
    extract($_POST);
    $code = strtolower($CodeC);
    update($nomC,$code,$nbrHeureC,$idC);
    index();
}

/**
 * Affiche la vue permettant de faire la modification des cours.
 * Elle vient avec les informations relatives à un cours particulier.
 * Utilise le model pour intéragir avec la Base de données
 * @param int $id l'identifiant du cours
 * @return string le contenu de la vue
 */
function viewEdit($id){
    $cours = getInfosCours($id);
    //var_dump($cours);
    return require_once '../app/views/cours/edit.php';
}

/**
 * Intéragit avec le model pour insérer les données contenues dans le tableau super global $_POST dans la base de données.
 * Elle utilise la fonction create du model pour inserer les données
 * @return void
 */
function store(){
    extract($_POST);
    $code = strtolower($CodeC);
    create($nomC,$code,$nbrHeureC);
    index();
}

/**
 * Intéragis avec le model pour supprimer le cours selon son id en utilisant la fonction delete du models
 * @param int  $id l'identifiant unique du cours dans la base de données
 * @return void
 */
function remove($id){
    delete($id);
    index();
}
