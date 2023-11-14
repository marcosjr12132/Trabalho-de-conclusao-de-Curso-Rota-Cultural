<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens com Botão de Curtida (Coração) e Setas</title>
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

        .seta {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #000;
            border: 2px solid #000;
            border-radius: 50%;
        }

        .seta-esquerda {
            left: 10px;
        }

        .seta-direita {
            right: 10px;
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
            perspective: 1200px; /* Adiciona perspectiva para criar o efeito 3D */
        }

        .imagem {
            width: 800px; /* Modifique o valor da largura conforme desejado */
            height: 600px; /* Modifique o valor da altura conforme desejado */
            object-fit: cover;
            transition: transform 1s; /* Adiciona uma transição suave */
        }

        .imagem:not(:first-child) {
            margin-left: -50%; /* Espaçamento entre as imagens para criar o efeito 3D */
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
            display: flex; /* Adicionado para alinhar elementos horizontalmente */
            align-items: center; /* Adicionado para alinhar elementos verticalmente */
        }

        #coracao {
            color: #ccc;
            margin-right: 5px; /* Adicionado margem para separar o coração do número de curtidas */
        }

        #curtida-btn.curtido #coracao {
            color: #e74c3c; /* Cor vermelha quando curtido */
        }

        #curtidas {
            color: #000; /* Cor preta para o número de curtidas */
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
            <div class="seta seta-esquerda" onclick="mudarImagem(-1)">&lt;</div>
            <div class="imagem-container">
                <img class="imagem" id="imagemAtual" alt="Imagem Atual" />
            </div>
            <div class="seta seta-direita" onclick="mudarImagem(1)">&gt;</div>
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
        let numeroCurtidas = 0;
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

            const setaEsquerda = document.querySelector('.seta-esquerda');
            const setaDireita = document.querySelector('.seta-direita');

            if (imagemAtual === 0) {
                setaEsquerda.style.display = 'none';
            } else {
                setaEsquerda.style.display = 'flex';
            }

            if (imagemAtual === imagens.length - 1) {
                setaDireita.style.display = 'none';
            } else {
                setaDireita.style.display = 'flex';
            }

            exibirImagem();
        }

        function exibirImagem() {
            const imagemAtualElement = document.getElementById('imagemAtual');
            imagemAtualElement.src = imagens[imagemAtual];
        }

        function curtirFoto() {
            const curtidaBtn = document.getElementById('curtida-btn');

            if (curtida) {
                curtidaBtn.classList.remove('curtido');
                numeroCurtidas--;
            } else {
                curtidaBtn.classList.add('curtido');
                numeroCurtidas++;
            }

            curtida = !curtida;
            document.getElementById('coracao').innerText = curtida ? '❤️' : '🤍'; // Alterna entre coração vermelho e branco
            document.getElementById('curtidas').innerText = numeroCurtidas;
        }

        buscarImagens();

        function updateLabel() {
            var input = document.getElementById('imagem');
            var label = document.getElementById('imagemLabel');
            var fileName = input.value.split('\\').pop(); // Extraindo o nome do arquivo

            // Atualizando o rótulo apenas se um arquivo foi selecionado
            if (fileName) {
                label.innerHTML = 'Imagem selecionada: ' + fileName;
            } else {
                label.innerHTML = 'Adicionar Imagem';
            }
        }
    </script>
</body>
</html>
