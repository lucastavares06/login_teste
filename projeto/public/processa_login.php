<?php
include '../config/config.php';

// Iniciar a sessão
session_start();

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha as credenciais do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Consulta SQL para obter a senha do usuário
    $sql = "SELECT * FROM usuario WHERE usuario = :usuario";

    try {
        // Preparar a consulta
        $stmt = $conexao->prepare($sql);

        // Vincular parâmetros
        $stmt->bindParam(':usuario', $usuario);

        // Executar a consulta
        $stmt->execute();

        // Obter os resultados da consulta
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar se o usuário existe
        if ($result) {
            // Verificar se a senha fornecida corresponde à senha no banco de dados
            if (password_verify($senha, $result['senha'])) {
                // Login bem-sucedido
                // Armazenar informações do usuário na sessão
                $_SESSION['usuario_id'] = $result['id'];
                $_SESSION['usuario_nome'] = $result['nome'];
                $_SESSION['usuario_usuario'] = $result['usuario'];
                $_SESSION['usuario_email'] = $result['email'];

                // Redirecionar para a página de dashboard
                header('Location: ../private/app/dashboard.php');
                exit();
            } else {
                // Senha incorreta - Redireciona para a index.php com a mensagem de erro
                $erro = urlencode('Senha incorreta.');
                header("Location: ../index.php?erro=$erro");
                exit();
            }
        } else {
            // Usuário não encontrado - Redireciona para a index.php com a mensagem de erro
            $erro = urlencode('Usuário não encontrado.');
            header("Location: ../index.php?erro=$erro");
            exit();
        }
    } catch (PDOException $e) {
        // Erro na consulta - Redireciona para a index.php com a mensagem de erro
        $erro = urlencode("Erro na consulta: " . $e->getMessage());
        header("Location: ../index.php?erro=$erro");
        exit();
    }
}
