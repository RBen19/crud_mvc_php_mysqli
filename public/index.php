<?php
require_once '../app/database.php';
require_once '../app/models/Etudiant.php';
require_once '../app/models/cours.php';
require_once '../app/controllers/coursController.php';
require_once '../app/controllers/EtudiantController.php';


if(isset($_GET['action']) && ! empty($_GET['action'])) {

    if($_GET['action'] == 'ajouterCours') {
        view_create();
    }
    if($_GET['action'] == 'creerCours') {
        store();
    }
    if($_GET['action'] == 'voirCours') {
        index();
    }

    if($_GET['action'] == 'supprimerCours') {
        remove($_GET['idC']);
    }
    if($_GET['action'] == 'ModifierCours') {
        viewEdit($_GET['idC']);
    }
    if($_GET['action'] == 'ValiderModif') {
        validerUpdate();
    }
    if($_GET['action'] == 'ajouterEtd') {
            view_createEtd();
    }
    if($_GET['action'] == 'ModifierEtd') {
        viewEditEtd($_GET['idE']);
    }

    if($_GET['action'] == 'creerEtd') {
        storeEtd();
    }
    if($_GET['action'] == 'voirEtudiants') {
        indexEtd();
    }
    if($_GET['action'] == 'supprimerEtd') {
        removeEtd($_GET['idE']);
    }
    if($_GET['action'] == 'ValiderMAJ') {
        editEtudiant();
    }


}else{
    index();
}

