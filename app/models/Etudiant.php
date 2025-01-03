<?php
//require_once '../../database.php';
/**
 * Ajoute un Etudiant dans la Base de données
 * @param string $nom représente le nom de l'étudiant
 * @param string $prenom représente le prenom de l'étudiant
 * @param string $mail représente le mail de l'étudiant
 * @param string $filiere représente la filière de l'étudiant
 * @global mysqli $conn connexion à la BDD
 * @return void
 */
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
/**
 * Selectionne tous les enregistrements des Etudiants présent dans la base
 * @global mysqli  $conn connexion à la base de données.
 * @return mysqli_result|false Retourne un objet mysqli_result si la requête est réussie, False en cas d'echec
 */
function readEtd(){
    global $conn;
    $query="SELECT * FROM etudiant";
    return  mysqli_query($conn,$query);
}

/**
 * Récupère un étudiant selon son id
 * Cette fonction retourne flase en cas d'échec et un objet mysqli_result en cas de succès
 * @param int $id identifiant de l'étudiant
 * @return false|mysqli_result
 */
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

/**
 * Permet de faire la mise à jour dans la Base de données.
 * Cette fonction prend en paramètre le nom, le prenom, le mail, la filière et l'identifiant id de l'étudiant.
 * Elle retourne true en cas de réussite, false en cas d'échec
 * @param string $nom
 * @param string $prenom
 * @param string $mail
 * @param  string $filiere
 * @param int $id
 * @return bool
 */
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

/**
 *  Supprime un cours
 *  Cette fonction supprime un Etudiant selon son identifiant unique dans la base.
 * Elle retourne un boolean true en cas de success et false en cas d'échec
 * @param int $id identifiant unique de l'étudiant dans la Base de données
 * @return bool
 */
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

