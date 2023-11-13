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

        .imagem {
            width: 800px; /* Modifique o valor da largura conforme desejado */
            height: 600px; /* Modifique o valor da altura conforme desejado */
            object-fit: cover;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="galeria">
            <div class="seta seta-esquerda" onclick="mudarImagem(-1)">&lt;</div>
            <img class="imagem" src="https://i.ibb.co/1RrVz5B/imagem1.jpg" alt="Imagem 1" />
            <div class="seta seta-direita" onclick="mudarImagem(1)">&gt;</div>
        </div>
        <button id="curtida-btn" onclick="curtirFoto()"><span id="coracao">❤️</span><span id="curtidas">0</span></button>
    </div>
    <div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecione uma imagem para upload:
        <input type="file" name="imagem" id="imagem">
        <input type="submit" value="Enviar Imagem" name="submit"> <!-- isso aqui tem que melhorar o botao, tirar o "nenhum arquivo escolhido", tirar o "escolher arquivo" e deixar so um botao de "ADICIONAR FOTO" que vai fazer todas as funcoes anteriores automaticamente -->
        
    </div>
    <script>
        let curtida = false;
        let numeroCurtidas = 0;
        let imagemAtual = 1;
        const imagens = [
            "https://ibb.co/wyJCmv1",
            "https://ibb.co/XkMLqG0",
            "https://ibb.co/zGtP8D4"

        ];

        function mudarImagem(direcao) {
            imagemAtual = (imagemAtual + direcao + imagens.length) % imagens.length;
            exibirImagem();
        }

        function exibirImagem() {
            const galeria = document.querySelector('.galeria');
            galeria.innerHTML = `<div class="seta seta-esquerda" onclick="mudarImagem(-1)">&lt;</div><img class="imagem" src="${imagens[imagemAtual]}" alt="Imagem ${imagemAtual + 1}" /><div class="seta seta-direita" onclick="mudarImagem(1)">&gt;</div>`;
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

        // Iniciar a troca automática de imagens a cada 5 segundos
        setInterval(() => mudarImagem(1), 5000);
    </script>
</body>
</html>
