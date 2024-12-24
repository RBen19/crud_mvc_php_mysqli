
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<button type="button" class="btn btn-outline-secondary"><a href="?action=ajouterCours" style="color: black">Ajouter Un Cours</a>
</button>
<button type="button" class="btn btn-outline-warning"><a href="?action=ajouterEtd" style="color: black">Ajouter Un Etudiant</a>
</button>
<div class="container mt-5">


    <table class="table table-striped"">
    <thead>
    <tr>
        <th>#</th>
        <th>Nom de L'étudiant</th>
        <th>Prenom de L'étudiant</th>
        <th>Email de L'étudiant</th>
        <th>Filière de L'étudiant</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($etudiant = mysqli_fetch_assoc($etudiants)):

        ?>
        <tr>
            <td><?= $etudiant["id"] ?></td>
            <td><?= $etudiant["nomEtd"] ?></td>
            <td><?= $etudiant["prenomEtd"] ?></td>
            <td><?= $etudiant["mailEtd"] ?></td>
            <td><?= $etudiant["filiereEtd"] ?></td>
            <td>
                <button type="button" class="btn btn-primary btn-sm"><a href="?action=ModifierEtd&idE=<?=$etudiant["id"]?>"
                                                                        style="text-decoration: none;color: #fff">Modifier</a></button>
                <button type="button" class="btn btn-danger btn-sm"><a href="?action=supprimerEtd&idE=<?=$etudiant["id"]?>"
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