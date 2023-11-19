<?php
// Conecte-se ao banco de dados
include('conexao.php');

// Valide o login
if (isset($_POST["email"]) && isset($_POST["senha"])) {
    $email = $_POST["email"];
    $senhaInserida = $_POST["senha"];

    // Prepare a consulta SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");

    // Vincule os parâmetros da consulta
    $stmt->bind_param("s", $email);

    // Execute a consulta
    $stmt->execute();

    // Obtenha o resultado
    $result = $stmt->get_result();

    // Verifique se o usuário existe
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verifique a senha
        if ($senhaInserida === $usuario["senha"]) {
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("Location: usercadastrado.php");
            exit(); // Adiciona esta linha para garantir que o script pare após redirecionar
        } else {
            // Senha inválida
            echo "Senha inválida. Verifique a senha inserida.";
        }
    } else {
        // Usuário não existe
        echo "Usuário não encontrado. Verifique o email inserido.";
    }

    // Feche a consulta
    $stmt->close();
}

// Feche a conexão
$conn->close();
?>
