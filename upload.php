<?php
$baseURL = "https://seusite.com/uploads/";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])) {
    $conexao = new mysqli("seu_host", "seu_usuario", "sua_senha", "seu_banco_de_dados");

    // Verifique a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Realize o upload da imagem
    $nomeArquivo = basename($_FILES["imagem"]["name"]);
    $caminhoArquivo = "uploads/" . $nomeArquivo; // Certifique-se de criar a pasta "uploads" no mesmo diretório do script PHP
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoArquivo);

    // Insira o nome do arquivo no banco de dados
    $sql = "INSERT INTO imagens (nome_arquivo) VALUES ('$nomeArquivo')";
    if ($conexao->query($sql) === TRUE) {
        echo "O arquivo " . htmlspecialchars($nomeArquivo) . " foi enviado com sucesso.";
    } else {
        echo "Erro ao inserir no banco de dados: " . $conexao->error;
    }

    $conexao->close();
}
?>
