<?php
include 'config/config.php';

// Iniciar a sessão
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/estilo/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <title>Projeto</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Projeto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=cadastrar">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php include 'route/route.php'; ?>
    </div>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
