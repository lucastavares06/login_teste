<?php
include 'config/config.php';
?>

<?php
// Iniciar a sessão
session_start();

// Verificar se há uma mensagem de erro na URL
if (isset($_GET['erro'])) {
    $erro = urldecode($_GET['erro']);
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: '<?php echo $erro; ?>',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
<?php
}

// Verificar se há uma mensagem de sucesso na URL
if (isset($_GET['mensagem'])) {
    $mensagem = urldecode($_GET['mensagem']);
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: '<?php echo $mensagem; ?> ',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
<?php
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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

    <!-- Bootstrap JavaScript (popper.js is no longer required in Bootstrap 5) -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>