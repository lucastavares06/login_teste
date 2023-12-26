<?php
include '../config/config.php';

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtenha os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Verifique se o usuário já existe no banco de dados
        $verificarUsuario = "SELECT * FROM usuario WHERE usuario = :usuario";
        $verificarEmail = "SELECT * FROM usuario WHERE email = :email";

        // Iniciar transação
        $conexao->beginTransaction();

        // Verificar se o usuário já existe
        $stmtUsuario = $conexao->prepare($verificarUsuario);
        $stmtUsuario->bindParam(':usuario', $usuario);
        $stmtUsuario->execute();

        // Verificar se o e-mail já está em uso
        $stmtEmail = $conexao->prepare($verificarEmail);
        $stmtEmail->bindParam(':email', $email);
        $stmtEmail->execute();

        if ($stmtUsuario->rowCount() > 0) {
            throw new Exception("Este nome de usuário já está em uso. Escolha outro.");
        } elseif ($stmtEmail->rowCount() > 0) {
            throw new Exception("Este e-mail já está em uso. Escolha outro.");
        }

        // Insira o novo usuário no banco de dados
        $inserirUsuario = "INSERT INTO usuario (nome, email, usuario, senha) VALUES (:nome, :email, :usuario, :senha)";

        $stmt = $conexao->prepare($inserirUsuario);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':usuario', $usuario);

        // Recomenda-se usar hashes seguros para senhas
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bindParam(':senha', $senhaHash);

        // Execute a consulta
        if ($stmt->execute()) {
            // Commit da transação se tudo ocorreu bem
            $conexao->commit();
            $mensagem = urlencode("Cadastro realizado com sucesso, $nome!");
            header("Location: ../index.php?pagina=cadastrar&mensagem=$mensagem");
            exit();
        } else {
            throw new Exception("Erro durante o cadastro");
        }
    } catch (Exception $e) {
        // Rollback em caso de erro
        $conexao->rollBack();
        $erro = urlencode("Erro durante o cadastro: " . $e->getMessage());
        header("Location: ../index.php?pagina=cadastrar&erro=$erro");
        exit();
    }
}
