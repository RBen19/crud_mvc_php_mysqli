<?php
function view_create(){
    return require_once '../app/views/cours/create.php';
}
function index(){
    $cours= read();
    return require_once '../app/views/cours/show.php';
}
function validerUpdate(){
    extract($_POST);
    $code = strtolower($CodeC);
    update($nomC,$code,$nbrHeureC,$idC);
    index();
}
function viewEdit($id){
    $cours = getInfosCours($id);
    //var_dump($cours);
    return require_once '../app/views/cours/edit.php';
}
function view_read(){

}
function store(){
    extract($_POST);
    $code = strtolower($CodeC);
    create($nomC,$code,$nbrHeureC);
    index();
}
function remove($id){
    delete($id);
    index();
}
