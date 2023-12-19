<?php
// Inicie a sessão
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../../index.php'); // Redirecione para a página de login se não estiver logado
    exit();
}

// Recupere informações da sessão
$usuarioId = $_SESSION['usuario_id'];
$usuarioNome = $_SESSION['usuario_nome'];
$usuarioUsuario = $_SESSION['usuario_usuario'];
$usuarioEmail = $_SESSION['usuario_email'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendor/estilo/estilo.css">

    <title>Projeto - Dashboard</title>
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
                        <a class="nav-link" href="?pagina=perfil">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php include '../private_route/private_route.php'; ?>
    </div>

    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
