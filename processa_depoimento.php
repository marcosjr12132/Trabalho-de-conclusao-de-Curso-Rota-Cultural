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
//$baseURL: Uma constante que representa a URL base onde as imagens serão hospedadas.
//if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])): Verifica se a requisição é do tipo POST e se foi enviada uma imagem.
//basename($_FILES["imagem"]["name"]): Obtém o nome do arquivo da imagem.
//move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoArquivo): Move o arquivo da imagem para a pasta de uploads.
//$sql = "INSERT INTO imagens (nome_arquivo) VALUES ('$nomeArquivo')": Prepara uma instrução SQL para inserir o nome do arquivo no banco de dados.
?>
