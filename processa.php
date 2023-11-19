<?php
include('conexao.php');

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefone = mysqli_real_escape_string($conn, $_POST['phone']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

// Não criptografe a senha
//$hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
$caminhoImagem = 'imagens/profile.jpg';
$localizacaoPadrao = 'Divinopolis, Minas Gerais';
$idadePadrao = 0;
$biografiaPadrao = '';

$sql = $conn->prepare("INSERT INTO usuarios (nome, email, telefone, senha, tipo, caminho_imagem, localizacao, idade, biografia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssssssi", $nome, $email, $telefone, $senha, $tipo, $caminhoImagem, $localizacaoPadrao, $idadePadrao, $biografiaPadrao);

if ($sql->execute()) {
    header("Location: usercadastrado.php");
    exit();
} else {
    echo "Erro ao cadastrar. Por favor, tente novamente.";
}
$conn->close();
?>

