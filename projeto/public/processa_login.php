<?php
include '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE usuario = :usuario";

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

                header('Location: ../private/app/dashboard.php');
                exit();
            } else {
                // Senha incorreta - Redireciona para a página de login com a mensagem de erro
                $erro = urlencode('Senha incorreta.');
                header("Location: ../index.php?pagina=login&erro=$erro");
                exit();
            }
        } else {
            // Usuário não encontrado - Redireciona para a página de login com a mensagem de erro
            $erro = urlencode('Usuário não encontrado.');
            header("Location: ../index.php?pagina=login&erro=$erro");
            exit();
        }
    } catch (PDOException $e) {
        // Erro na consulta - Redireciona para a página de login com a mensagem de erro
        $erro = urlencode("Erro na consulta: " . $e->getMessage());
        header("Location: ../index.php?pagina=login&erro=$erro");
        exit();
    }
}
