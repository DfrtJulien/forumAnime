<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ani'Manga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<nav class="navbar navbar-expand-lg bg-color-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/public/img/logo.png" alt="logo Ani'Manga" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  nav-a" aria-current="page" href="/">Accueil</a>
                </li>
                <?php
                if ($_SESSION) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link nav-a" href="/logout">Deconnexion</a>
                    </li>
                    <?php
                    if ($_SESSION['user']['role'] == "Admin") {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link nav-a" href="/users">Utilisateurs</a>
                        </li>
                    <?php
                    }
                } else {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link nav-a" href="/register">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-a" href="/connection">Connexion</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<body>