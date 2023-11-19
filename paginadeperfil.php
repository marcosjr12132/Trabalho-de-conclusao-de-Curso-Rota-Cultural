<?php
// Inclua o arquivo de conexão e verificação de sessão (se você não tiver uma verificação, adapte conforme necessário)
include('conexao.php');

// Verifique se o usuário está logado antes de acessar a página de perfil
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Recupere as informações do usuário do banco de dados (substitua 'usuarios' pelo nome real da sua tabela)
$userId = $_SESSION['id'];
$sql = "SELECT * FROM usuarios WHERE id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $biografia = $row['biografia'];
    $idade = $row['idade'];
    $localizacao = $row['localizacao'];
    $telefone = $row['telefone'];
    $email = $row['email'];
    // Adicione mais campos conforme necessário
} else {
    // Trate o caso em que o usuário não foi encontrado no banco de dados
    echo "Erro: Usuário não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f8fa;
        }

        header {
            background-color: #24292e;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .profile-info,
        .social-media {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .ask-me-anything {
            background-color: #f0f0f0;
            padding: 20px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #0366d6;
        }

        footer {
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #24292e;
            color: #fff;
        }

        .profile-image {
            max-width: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        h1, h2 {
            margin-bottom: 10px;
        }

        .profile-info h2, .social-media h2, .ask-me-anything h2 {
            color: #0366d6;
        }

        .edit-profile-btn {
            background-color: #0366d6;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-profile-btn:hover {
            background-color: #004080;
        }

        .ask-me-anything,
        .profile-image-upload,
        .profile-edit-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .profile-edit-modal label {
            display: block;
            margin-bottom: 10px;
        }

        .profile-edit-modal input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        .profile-edit-modal button {
            background-color: #0366d6;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .preview-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        .image-section {
            text-align: center;
            margin-top: 20px;
        }

        .profile-image-options {
            margin-top: 10px;
        }
    </style>
    <title>Meu Perfil</title>
</head>

<body>
    <header>
        <h1><?= $nome ?></h1>

        <!-- Seção de Imagem de Perfil -->
        <div class="image-section">
            <img id="preview-image" class="preview-image profile-image" src="<?= $caminhoImagem ?>" alt="Foto de Perfil">
        </div>

        <!-- Botão para Tirar/Escolher Foto -->
        <div class="profile-image-options">
            <button onclick="openImageOptions()" class="edit-profile-btn">Escolher/Tirar Foto</button>
        </div>
        <!-- Adicione esta linha para chamar a função fillEditModal() -->
        <button class="edit-profile-btn" onclick="openEditModal(); fillEditModal()">Editar Perfil</button>

        <div id="edit-modal" class="profile-edit-modal">
            <label for="edit-biography">Biografia:</label>
            <textarea id="edit-biography" name="edit-biography"><?= $biografia ?></textarea>
            <button onclick="saveProfileChanges()">Salvar Alterações</button>
            <button onclick="closeEditModal()">Cancelar</button>
        </div>

        <!-- Preview da Foto de Perfil -->
        <div id="image-preview" class="profile-image-upload" style="display: none;">
            <h2>Preview da Foto de Perfil</h2>
            <img id="preview-image" class="preview-image" alt="Preview da Foto de Perfil">
        </div>
        <!-- Biografia -->
        <section class="profile-info">
            <h2>Biografia</h2>
            <p id="biography"><?= $biografia ?></p>
            <button class="edit-profile-btn" onclick="openEditModal(); fillEditModal()">Editar Perfil</button>
        </section>

        <!-- Informações Pessoais -->
        <section class="profile-info">
            <h2>Informações Pessoais</h2>
            <ul>
                <li><strong>Nome:</strong> <span id="user-name"><?= $nome ?></span></li>
                <li><strong>Idade:</strong> <span id="user-age"><?= $idade ?></span></li>
                <li><strong>Localização:</strong> <span id="user-location"><?= $localizacao ?></span></li>
                <li><strong>Telefone:</strong> <span id="user-phone"><?= $telefone ?></span></li>
                <li><strong>Email:</strong> <span id="user-email"><?= $email ?></span></li>
                <!-- Adicione mais informações conforme necessário -->

            </ul>
        </section>

        <!-- Adicione mais seções conforme necessário -->

        <footer>
            <p>&copy; 2023 Meu Perfil</p>
        </footer>

        <script>
            // Função para preencher os campos do modal com as informações atuais do perfil
            function fillEditModal() {
                document.getElementById('edit-biography').value = '<?= $biografia ?>';
            }

            function openEditModal() {
                // Preenche os campos do modal com as informações atuais
                fillEditModal();
                document.getElementById('edit-modal').style.display = 'block';
            }

            function closeEditModal() {
                document.getElementById('edit-modal').style.display = 'none';
            }

            function saveProfileChanges() {
                // Atualiza as informações no perfil com os novos valores do modal
                document.getElementById('biography').innerText = document.getElementById('edit-biography').value;

                // Fecha o modal
                closeEditModal();
            }

            function openImageOptions() {
                document.getElementById('file-input').click();
            }

            function uploadImage(input) {
                const file = input.files[0];

                if (file) {
                    const formData = new FormData();
                    formData.append('image', file);

                    const uploadUrl = 'caminho/para/seu/upload.php';

                    fetch(uploadUrl, {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.imageUrl) {
                                // Exiba a imagem na prévia
                                document.getElementById('preview-image').src = data.imageUrl;

                                // Atualize o caminho da imagem no banco de dados
                                saveImageUrlToDatabase(data.imageUrl);
                            } else {
                                console.error('Erro ao receber a URL da imagem do servidor:', data.error);
                            }
                        })
                        .catch(error => console.error('Erro ao fazer upload da imagem:', error));
                }
            }

            function saveImageUrlToDatabase(imageUrl) {
                // Adapte conforme necessário para enviar o caminho da imagem ao servidor (usando AJAX, por exemplo)
                console.log('Salve o caminho da imagem no banco de dados:', imageUrl);
            }
        </script>
</body>

</html>
