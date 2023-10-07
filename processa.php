<?php
include('conexao.php');

// Validar e sanitizar dados do formulário
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefone = mysqli_real_escape_string($conn, $_POST['phone']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

// Hash da senha (use uma função mais segura em um ambiente de produção)
$hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

// Preparar a declaração SQL
$sql = $conn->prepare("INSERT INTO usuarios (nome, email, telefone, senha, tipo) VALUES (?, ?, ?, ?, ?)");

// Vincular parâmetros
$sql->bind_param("sssss", $nome, $email, $telefone, $hashedSenha, $tipo);

// Executar a declaração
if ($sql->execute()) {
    // Redirecionar para a página usercadastrado.php
    header("Location: usercadastrado.php");
    exit();
} else {
    echo "Erro ao cadastrar. Por favor, tente novamente.";
}

// Fechar a conexão
$conn->close();
?>
