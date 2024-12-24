<?php
//require_once '../../database.php';

function createEtd($nom,$prenom,$mail,$filiere){
    global $conn;
    $query="INSERT INTO etudiant (`nomEtd`,`prenomEtd`,`mailEtd`,`filiereEtd`) values (?,?,?,?)";
    $stmt=mysqli_prepare($conn,$query);
    if(!$stmt){
        echo "prepare failed: " . mysqli_error($conn);
    }
     mysqli_stmt_bind_param($stmt,"ssss",$nom,$prenom,$mail,$filiere);
     mysqli_stmt_execute($stmt);

}
function readEtd(){
    global $conn;
    $query="SELECT * FROM etudiant";
    return  mysqli_query($conn,$query);
}
function getOneEtd($id){
    global $conn;
    $query="SELECT * FROM etudiant where id=?";
    $stmt= mysqli_prepare($conn,$query);
    if(!$stmt){
        echo "prepare failed: " . mysqli_error($conn);
    }
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}
function updateEtd($nom,$prenom,$mail,$filiere,$id){
    global $conn;
    $query="UPDATE etudiant set nomEtd = ? , prenomEtd = ? , mailEtd = ? , filiereEtd = ? WHERE id = ?";
   $stmt= mysqli_prepare($conn,$query);
    if(!$stmt){
        echo "prepare failed: " . mysqli_error($conn);
    }
    mysqli_stmt_bind_param($stmt,"ssssi",$nom,$prenom,$mail,$filiere,$id);
   return mysqli_stmt_execute($stmt);
}
function deleteEtd($id){
    global $conn;
    $query="DELETE FROM etudiant WHERE id = ?";
    $stmt= mysqli_prepare($conn,$query);
    if(!$stmt){
        echo "prepare failed: " . mysqli_error($conn);
    }
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
}
//deleteEtd(1);
//updateEtd("n1","N1","N1biss@gmail.com","gl",1);
