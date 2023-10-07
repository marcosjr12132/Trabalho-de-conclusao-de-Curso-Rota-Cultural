<?php
session_start();

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Certifique-se de validar e filtrar os dados do formulário
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $depoimento = $mysqli->real_escape_string($_POST['depoimento']);

    // Obtenha a foto de perfil e o nome da sessão
    $foto_perfil = $_POST['caminho_perfil'];

    // Processamento da imagem de perfil
    $foto_nome = uniqid() . '_' . $nome . '.jpg'; // Use o nome do usuário para garantir unicidade
    $foto_caminho = 'caminho/para/armazenar/fotos/' . $foto_nome;

    // Salve a foto de perfil no servidor
    file_put_contents($foto_caminho, file_get_contents($foto_perfil));

    // Inserindo o depoimento no banco de dados
    $sql_code = "INSERT INTO depoimentos (nome, depoimento, caminho_perfil) VALUES ('$nome', '$depoimento', '$foto_caminho')";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    if ($sql_query) {
        echo "Depoimento enviado com sucesso!";
    } else {
        echo "Erro ao enviar depoimento. Tente novamente.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
