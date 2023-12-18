<?php

$host = 'localhost';
$dbname = 'projeto';
$user = 'root';
$password = '';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    // Configuração para relatar erros do PDO
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Configuração para usar caracteres UTF-8
    $conexao->exec("set names utf8");
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    die();
}
