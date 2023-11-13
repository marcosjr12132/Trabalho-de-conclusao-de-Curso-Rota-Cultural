<!-- upload.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])) {
    $target_dir = "uploads/"; // Diretório onde as imagens serão armazenadas
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifique se o arquivo é uma imagem real ou uma imagem falsa
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            echo "O arquivo é uma imagem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }
    }

    // Verifique se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    // Verifique o tamanho do arquivo
    if ($_FILES["imagem"]["size"] > 500000) {
        echo "Desculpe, seu arquivo é muito grande.";
        $uploadOk = 0;
    }

    // Permitir apenas determinados formatos de arquivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifique se $uploadOk é definido como 0 por um erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    } else {
        // Se tudo estiver correto, tente fazer o upload do arquivo
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            echo "O arquivo " . htmlspecialchars(basename($_FILES["imagem"]["name"])) . " foi enviado com sucesso.";
        } else {
            echo "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    }
}
?>
