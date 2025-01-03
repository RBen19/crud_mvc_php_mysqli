
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<div class="d-flex justify-content-around mt-5">

    <button type="button" class="btn btn-outline-danger"><a href="?action=voirEtudiants" class="text-decoration-none text-dark">Voir la liste des Etudiants</a></button>
    <button type="button" class="btn btn-outline-secondary"><a href="?action=ajouterCours" style="color: black" class="text-decoration-none">Ajouter Un Cours</a>
    </button>

    <button type="button" class="btn btn-outline-warning"><a href="?action=ajouterEtd" style="color: black" class="text-decoration-none">Ajouter Un Etudiant</a>
    </button>
</div>
<div class="container mt-5">


<table class="table table-striped"">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom du Cours</th>
            <th>Code du Cours</th>
            <th>Volume Horaire</th>
            <th>Actions</th>
        </tr>
        </thead>
    <tbody>
    <?php
        while ($cour = mysqli_fetch_assoc($cours)):

    ?>
        <tr>
            <td><?= $cour["idcours"] ?></td>
            <td><?= $cour["NomCours"] ?></td>
            <td><?= $cour["CodeCours"] ?></td>
            <td><?= $cour["nbrHeureCours"] ?></td>


            <td>
                <button type="button" class="btn btn-primary btn-sm"><a href="?action=ModifierCours&idC=<?=$cour["idcours"]?>"
                    style="text-decoration: none;color: #fff">Modifier</a></button>
                <button type="button" class="btn btn-danger btn-sm"><a href="?action=supprimerCours&idC=<?=$cour["idcours"]?>"
                    style="text-decoration: none;color: #fff">Supprimer</a></button>
            </td>
        </tr>
    <?php
     endwhile;
    ?>

    </tbody>

</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>