<?php
// Arquivo de configuração do banco de dados
include('conexao.php');

// Diretório onde as imagens dos usuários serão armazenadas
$uploadDirectory = 'processa_php/';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];

    // Verifica se o upload foi bem-sucedido
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Gera um nome único para o arquivo
        $fileName = uniqid() . '_' . basename($file['name']);
        $targetPath = $uploadDirectory . $fileName;

        // Move o arquivo para o diretório de uploads
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Atualiza o caminho da imagem no banco de dados (substitua 'usuarios' pelo nome real da sua tabela)
            $userId = $_SESSION['id'];
            $updateSql = "UPDATE usuarios SET caminho_imagem = '$targetPath' WHERE id = $userId";
            if ($conn->query($updateSql) === TRUE) {
                // Retorna a URL da imagem para exibição na prévia
                echo json_encode(['imageUrl' => $targetPath]);
            } else {
                echo json_encode(['error' => 'Erro ao atualizar o banco de dados']);
            }
        } else {
            echo json_encode(['error' => 'Erro ao mover o arquivo para o diretório de uploads']);
        }
    } else {
        echo json_encode(['error' => 'Erro durante o upload do arquivo']);
    }
} else {
    echo json_encode(['error' => 'Requisição inválida']);
}
?>
