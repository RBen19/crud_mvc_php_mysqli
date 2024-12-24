<?php
//require_once '../database.php';

 function create($NomCours,$CodeCours,$nbrHeuresCours)
{
    global $conn;

    $verif = getCoursByCodeCours($CodeCours);
    if($verif==$CodeCours){
        return null ;
    }else{
    $query="INSERT INTO cours(NomCours,CodeCours,nbrHeureCours) values (?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }
    $stmt=mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt, "ssi", $NomCours, $CodeCours, $nbrHeuresCours);
    return mysqli_stmt_execute($stmt);
    }
}
 function read(){
    global $conn;
    $query="SELECT * FROM cours";
    return mysqli_query($conn, $query);
}
function getCoursByCodeCours($codeCours){
     global $conn;
     $val="";
       $query="SELECT CodeCours FROM cours WHERE codeCours = ?";
       $stmt=mysqli_prepare($conn,$query);
       mysqli_stmt_bind_param($stmt, "s", $codeCours);
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "ce code appartient a un cours";
            var_dump($row['CodeCours']);
            $val= $row['CodeCours'];
        }
        return $val;
}

function getInfosCours($id){
    global $conn;
    $query="SELECT * FROM cours WHERE idcours = ?";
    $stmt=mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function update($NomCours,$CodeCours,$nbrHeuresCours,$idCours){
     global $conn;
     $query="UPDATE cours set NomCours = ?,CodeCours=?, nbrHeureCours=? where idcours = ?";
     $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ssii", $NomCours, $CodeCours, $nbrHeuresCours,$idCours);
    return mysqli_stmt_execute($stmt);
}
function delete($idCours){
     global $conn;
     $query="DELETE FROM cours where idcours = ?";
     $stmt = mysqli_prepare($conn, $query);
     if (!$stmt) {
         die("Prepare failed: " . mysqli_error($conn));
     }
     mysqli_stmt_bind_param($stmt, "i", $idCours);
     return mysqli_stmt_execute($stmt);
}
//create("cours2","cours2",20);
//update("cours4","c4",40,2);
//delete(2);
;
