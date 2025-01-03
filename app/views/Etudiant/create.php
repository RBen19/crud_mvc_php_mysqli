
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<br>
<div class="d-flex justify-content-left">
<button type="button" class="btn btn-outline-secondary"><a href="?action=voirEtudiants" class="text-decoration-none text-black">Voir la liste des Etudiants</a></button>
</div>
<div class="container mt-5">
    <form action="?action=creerEtd" METHOD="post">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de L'étudiant</label>
            <input type="text" class="form-control" name="nomEtd" required >
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom de L'étudiant</label>
            <input type="text" class="form-control"  name="pnomEtd" required >
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Email</label>
            <input type="text" class="form-control" name="emailEtd" required >
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Filière</label>
            <input type="text" class="form-control" name="filiEtd"  required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

