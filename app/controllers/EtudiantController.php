<?php
function view_createEtd(){
    return require_once '../app/views/Etudiant/create.php';
}
function storeEtd(){
    extract($_POST);
    createEtd($nomEtd,$pnomEtd,$emailEtd,$filiEtd);
    indexEtd();
}
function indexEtd(){
     $etudiants = readEtd();
     require_once '../app/views/Etudiant/show.php';
}
function removeEtd($id){
    deleteEtd($id);
    indexEtd();
}
function viewEditEtd($id){
    $etd = getOneEtd($id);
    return require_once '../app/views/Etudiant/edit.php';
}
function editEtudiant(){
    extract($_POST);
    updateEtd($nomEtd,$pnomEtd,$emailEtd,$filiEtd,$idEtd);
    indexEtd();
}