<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens com Botão de Curtida (Coração)</title>
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

        #curtida-btn {
            position: absolute;
            bottom: 1px;
            right: 1%;
            transform: translateX(-50%);
            cursor: pointer;
            font-size: 24px;
            color: #ccc;
            background: none;
            border: none;
            outline: none;
            display: flex;
            align-items: center;
        }

        #coracao {
            color: #ccc;
            margin-right: 5px;
        }

        #curtida-btn.curtido #coracao {
            color: #e74c3c;
        }

        #curtidas {
            color: #000;
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
        <button id="curtida-btn" onclick="curtirFoto()"><span id="coracao">❤️</span><span id="curtidas">0</span></button>
       <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="imagem" id="imagem" style="display: none;" onchange="updateLabel()">
            <label for="imagem" id="imagemLabel" style="cursor: pointer;">
             <!--   Adicionar Imagem -->
            </label>
            <input type="submit" value="Adicionar foto" name="submit">
        </form>
    </div>
    <script>
        let curtida = false;
        let imagemAtual = 0;
        let imagens = [];
        let curtidasPorImagem = {}; // Objeto para armazenar as curtidas por imagem

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
            document.getElementById('curtidas').innerText = curtidasPorImagem[imagemAtual] || 0;
        }

        function curtirFoto() {
            const curtidaBtn = document.getElementById('curtida-btn');

            if (curtida) {
                curtidaBtn.classList.remove('curtido');
                curtidasPorImagem[imagemAtual]--; // Reduz as curtidas para a imagem atual
            } else {
                curtidaBtn.classList.add('curtido');
                if (!curtidasPorImagem[imagemAtual]) {
                    curtidasPorImagem[imagemAtual] = 0; // Inicializa se não existir ainda
                }
                curtidasPorImagem[imagemAtual]++; // Aumenta as curtidas para a imagem atual
            }

            curtida = !curtida;
            document.getElementById('coracao').innerText = curtida ? '❤️' : '🤍';
            document.getElementById('curtidas').innerText = curtidasPorImagem[imagemAtual] || 0;
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
