<?php
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 'home';
}

switch ($pagina) {
    case 'home':
        include '../app/home.php';
        break;

    case 'perfil':
        include '../app/perfil.php';
        break;

    case 'logout':
        include '../app/logout.php';
        break;

    default:
        include '../app/404.php';
        break;
}
