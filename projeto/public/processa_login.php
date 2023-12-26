<?php
include '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, usuario, email, senha FROM usuario WHERE usuario = :usuario";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($senha, $result['senha'])) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $result['id'];
                $_SESSION['usuario_nome'] = $result['nome'];
                $_SESSION['usuario_usuario'] = $result['usuario'];
                $_SESSION['usuario_email'] = $result['email'];

                // Verificar se o usuário está autenticado antes de redirecionar
                if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['usuario_id'])) {
                    header('Location: ../private/app/dashboard.php');
                    exit();
                } else {
                    // Se o usuário não estiver autenticado, redirecione para a página de login
                    header('Location: ../index.php?pagina=login');
                    exit();
                }
            } else {
                // Senha incorreta
                $erro = urlencode('Senha incorreta.');
            }
        } else {
            // Usuário não encontrado
            $erro = urlencode('Usuário não encontrado.');
        }
    } catch (PDOException $e) {
        // Erro na consulta
        $erro = urlencode("Erro na consulta.");
        // Registre detalhes do erro em logs
        error_log("Erro na autenticação: " . $e->getMessage(), 0);
    }

    // Redirecionar para a página de login com a mensagem de erro
    header("Location: ../index.php?pagina=login&erro=$erro");
    exit();
}
