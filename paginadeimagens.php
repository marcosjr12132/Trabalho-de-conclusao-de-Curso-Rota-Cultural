<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            position: relative;
            text-align: center;
        }

        .titulo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .galeria {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .imagem-container {
            display: flex;
            align-items: center;
            perspective: 1200px;
        }

        .imagem {
            width: 500px;
            height: 300px;
            object-fit: cover;
            transition: transform 1s;
        }

        .imagem:not(:first-child) {
            margin-left: -50%;
        }

        .classedobotaoadicionarfoto {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="titulo">Mural de Imagens</div>
        <div class="galeria">
            <div class="imagem-container">
                <img class="imagem" id="imagemAtual" alt="Imagem Atual" />
            </div>
        </div>
        <form action="processar_upload.php" method="post" enctype="multipart/form-data">
        <label for="imagem">Selecione uma imagem:</label>
        <input type="file" name="imagem" id="imagem" accept="image/*">
        <!--<br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="4"></textarea>
        <br> -->
        <input type="submit" value="Enviar">
    </form>
    </div>
    <script>
        let imagemAtual = 0;
        let imagens = [];

        function buscarImagens() {
            fetch('buscar_imagens.php')
                .then(response => response.json())
                .then(data => {
                    imagens = data.map(imagem => imagem.url);
                    if (imagens.length > 0) {
                        exibirImagem();
                        setInterval(() => mudarImagem(1), 5000);
                    }
                })
                .catch(error => console.error('Erro ao buscar imagens:', error));
        }

        function mudarImagem(direcao) {
            imagemAtual = (imagemAtual + direcao + imagens.length) % imagens.length;
            exibirImagem();
        }

        function exibirImagem() {
            const imagemAtualElement = document.getElementById('imagemAtual');
            imagemAtualElement.src = imagens[imagemAtual];
        }

        function updateLabel() {
            var input = document.getElementById('imagem');
            var label = document.getElementById('imagemLabel');
            var fileName = input.value.split('\\').pop();

            if (fileName) {
                label.innerHTML = 'Imagem selecionada: ' + fileName;
            } else {
                label.innerHTML = 'Adicionar Imagem';
            }
        }

        buscarImagens();
    </script>
</body>
</html>
