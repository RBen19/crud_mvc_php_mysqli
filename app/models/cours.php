<?php
//require_once '../database.php';

/**
 * Creation d'un cours et ajout dans la Base de données
 * cette fonction creer  un cours en enregistrant son nom, son code et le nombre d'heures.
 * Elle vérifie égalemement si un cours existe déjà grâce à son code avant de l'enregistrer
 *
 * @param string $NomCours Le nom du cours.
 * @param string $CodeCours Le code unique du cours.
 * @param int $nbrHeuresCours Le nombre d'heures du cours.
 *
 * @return bool Retourne TRUE si la création est réussie, FALSE sinon.
 */
 function create($NomCours,$CodeCours,$nbrHeuresCours){
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
/**
 * Selectionne tous les enregistrements des cours present dans la base
 * @global mysqli  $conn connexion   à la base de données.
 * @return mysqli_result|false Retourne un objet mysqli_result si la requête est réussie, False en cas d'echec
 */
 function read(){
    global $conn;
    $query="SELECT * FROM cours";
    return mysqli_query($conn, $query);
}
/**
 * Recuperation du code d'un cours
 * Cette fonction recherche un cours dans la base de données en utilisant son code.
 * Si un cours correspondant est trouvé, elle retourne son code.
 * Sinon, elle retourne une chaîne vide.
 * @param string $codeCours Le code du cours à rechercher.
 * @return string Retourne le code du cours trouvé, ou une chaîne vide si aucun cours n'est trouvé.
 */
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
            $val= $row['CodeCours'];
        }
        return $val;
}

/**
 * Récupère les informations d'un cours à partir de son identifiant.
 *
 * Cette fonction recherche un cours dans la base de données en utilisant son identifiant.
 * Elle retourne un objet `mysqli_result` contenant les informations du cours.
 *
 * @param int $id L'identifiant du cours à rechercher.
 * @global mysqli $conn La connexion à la base de données.
 * @return mysqli_result|false Retourne un objet `mysqli_result` si un cours est trouvé,
 *         FALSE en cas d'échec de la requête.
 */
function getInfosCours($id){
    global $conn;
    $query="SELECT * FROM cours WHERE idcours = ?";
    $stmt=mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

/**
 * Fais la Mise à jour d'un cours dans la base de données
 * cette fonction fait la mise à jour d'un cours selon son id,
 * elle retourne true si tout se passe correctement false sinon
 * @param string $NomCours représente le nom du cours
 * @param string $CodeCours représente le code du cours
 * @param string $nbrHeuresCours représente le nombre d'heures du cours
 * @param int $idCours représente l'identifiant unique du cours
 * @global mysqli $conn représente la connexion à la base de donnée
 * @return bool renvoie true en cas de réussite false en cas d'échec
 */
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

/**
 * Supprime un cours
 * Cette fonction supprime un cours selon son identifiant unique dans la base
 * @param int  $idCours représente l'id du cours
 * @return bool Elle renvoie true en cas de réussite false en cas d'échec
 */
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

