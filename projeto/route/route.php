<?php
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 'home';
}

switch ($pagina) {
    case 'home':
        include 'home.php';
        break;

    case 'login':
        include 'login.php';
        break;

    case 'cadastrar':
        include 'cadastrar.php';
        break;

    default:
        include '404.php';
        break;
}
