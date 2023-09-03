<?php

include('protect.php');

?>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-icons { /* estilos dos botoes do google fontes */
            font-size: 24px; 
            margin-right: 10px; 
            cursor: pointer; }

        .icon-container { /* estilo dos botoes, calendario tema e perfil */
            position: fixed; 
            top: 20px; 
            left: 20px; 
            display: flex; 
            flex-direction: column;
            align-items: center;
            gap: 10px;
            z-index: 1000; 
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;}

        }
        .material-icons-outlined { /* algumas opcoes para redirecionamento dos botos, tamanho, etc */
            font-size: 24px; 
            margin-right: 10px; 
            cursor: pointer;  
        }
        body.light-theme { /* opcoes para o tema claro */
            margin: 0;
            padding: 0;
            background-color: rgba(255, 255, 255, 0.05);
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        } 


        body.dark-theme {
        background-color: #333;
        color: #fff;
        } /* opcoes para o tema escuro */

        
       .container h2 {
            color: #001744;
        }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 150px;
            padding-bottom: 150px; 
        }

        .container h1 {
            font-size: 36px;
            color: #001744;
        }

        .container p {
            font-size: 18px;
            font-weight: lighter;
            color: #888;
            margin-bottom: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .button-container {
            display: flex;
            justify-content: flex-start; 
            margin-top: 20px;
        }

        .button-container .button {
            padding: 10px 20px;
            font-size: 16px;
            color: #001744;
            background-color: #E1E1E1;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 999;
        }

        .button-container .button:first-child {
            margin-left: 85px;
        }

        .button-container .button:hover {
            background-color: #BEC1C8;
        }

        .help-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #FFFFFF;
            background-color: #001744;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .help-button:hover {
            background-color: #9FA2A8;
        }

        .about-section {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            text-align: center;
            position: fixed;
            bottom: 0;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 14px;
        }

        .about-section.appear {
            opacity: 1;
            transform: translateY(0);
        }

        .about-section h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .about-section p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        
       .image-container {
            width: 180%;
            height: 8cm;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

#popup {
  position: relative;
}

.close-button, .help-button {
  position: absolute;
  top: 10px; /* Ajuste essa propriedade para definir a distância a partir do topo */
  right: 10px; /* Ajuste essa propriedade para definir a distância a partir da direita */
  font-size: 20px;
  background: none;
  border: none;
  cursor: pointer;  background-color black;
}

.help-button {
  right: 50px; /* Ajuste essa propriedade para definir o espaço entre os botões */
    background-color black;
}





.close-button:focus {
    outline: none;
}


.card {
  width: 300px;
  border-radius: 5px;
  padding: 10px;
  background-color: #f9f9f9;
  display: inline-block; 
  margin-right: 10px; 
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2); 

.card h3 {
  color: #001744; 
  text-align: center; 
}
.card-container {
  display: flex;
}

   .testimonials {
      margin-top: 50px;
      text-align: center;
    }

    .testimonial-container {
      display: flex;
      flex-direction: row;
      justify-content: center;
      gap: 20px;
      border-top: 1px solid #ccc;
      padding-top: 20px;
      flex-wrap: wrap;
    }

    .testimonial {
  width: 300px;
  border-radius: 5px;
  padding: 10px;
  background-color: #f9f9f9;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2); 
}

    .testimonial .author {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .testimonial .content {
      font-style: italic;
      margin-top: 10px;
    }

    .testimonial .author-photo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover; 
      margin-bottom: 10px;
    }
    </style>
    
 <script>
    // script que vai nos permitir adicionar a rolagem no nosso site
    window.addEventListener('scroll', function() {
        var element = document.querySelector('.about-section');
        var position = element.getBoundingClientRect().top;
        var windowHeight = window.innerHeight;
        if (position < windowHeight) {
            element.classList.add('appear');
        }
    });

    // Adiciona outro evento de rolagem à janela do navegador
    window.addEventListener('scroll', function() {
        // Seleciona o elemento com a classe "footer" no documento HTML
        var footer = document.querySelector('.footer');
        // Calcula a posição atual do final da janela em relação ao documento
        var position = window.innerHeight + window.scrollY;
        // Obtém a altura total do documento HTML
        var documentHeight = document.body.offsetHeight;

        // Verifica se a posição é maior ou igual à altura do documento, indicando que o usuário rolou até o final
        if (position >= documentHeight) {
            // Adiciona a classe "show" ao elemento "footer"
            footer.classList.add('show');
        } else {
            // Remove a classe "show" do elemento "footer" se não estiver no final
            footer.classList.remove('show');
        }
    });

    // Adiciona um evento quando o DOM (Documento Object Model) estiver completamente carregado
    window.addEventListener('DOMContentLoaded', function() {
        // Seleciona o elemento com a classe "footer" no documento HTML
        var footer = document.querySelector('.footer');
        // Obtém a altura total do documento HTML
        var documentHeight = document.body.offsetHeight;
        // Obtém a altura da janela do navegador
        var windowHeight = window.innerHeight;

        // Verifica se a altura do documento é menor ou igual à altura da janela, indicando que o conteúdo é curto
        if (documentHeight <= windowHeight) {
            // Adiciona a classe "show" ao elemento "footer" para exibi-lo imediatamente
            footer.classList.add('show');
        }
    });

// todo esse script vai nos permitir mudar o tema do site
document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.getElementById("theme-toggle");
    const body = document.body;
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        body.classList.add(savedTheme);
    }
    themeToggle.addEventListener("click", function () {
        if (body.classList.contains("light-theme")) {
            body.classList.remove("light-theme");
            body.classList.add("dark-theme");
            localStorage.setItem("theme", "dark-theme");
        } else {
            body.classList.remove("dark-theme");
            body.classList.add("light-theme");
            localStorage.setItem("theme", "light-theme");
        }});}); // fim do script que vai nos permitir trocar o tema

    function openPopup() { // botao do ? que vai exibir o que é o site
        document.getElementById("popup").style.display = "block";
    }
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
    </script>
</head>
<body>
        <p>
        <a href="logout.php">Sair</a>
        </p>
    <div class="icon-container">
        <i class="material-icons md-48" data-href="perfil.php">face</i>
        <i class="material-icons" id="theme-toggle">nightlight_round</i>
        <span class="material-icons" data-href="calendario.php">calendar_today</span>
    </div>

<div>
  <span class="material-icons help-button" onclick="openPopup()">help</span>
  <div class="popup" id="popup" style="display: none;">
    <div class="popup-content">
      <button class="close-button" onclick="closePopup()">&#x2716;</button>
      <h2>Bem-vindo ao Rota Cultural</h2>
      <p>O seu portal de referência para a organização de eventos culturais nas escolas. Aqui, você encontrará recursos e ferramentas para planejar e realizar eventos culturais nas escolas, incluindo apresentações de teatro, concertos, exposições de arte e muito mais. Estamos empenhados em tornar a experiência cultural nas escolas mais acessível e inspiradora para todos os envolvidos. Juntos, podemos trazer a magia da cultura para as escolas e enriquecer a jornada educacional dos estudantes.</p>
    </div>
  </div>
</div>

    
    </div>
        <h1>Bem-vindo ao Rota Cultural</h1>
        <p>Descubra novos horizontes artísticos com a Rota Cultural: o programa escolar que leva você a uma viagem pelo conhecimento.</p>
        <div class="image-container">
            <img src="https://static5.vvale.com.br/wp-content/uploads/2017/03/DSC09145.jpg" alt="Imagem">
        </div>
        <h2>Próximos eventos</h2>
</div>
  <div class="card">
    <h3>Evento 1</h3>
    <p>Data: 15 de junho de 2023</p>
    <p>Descrição: Descrição do Evento 1.</p>
  </div>
  
  <div class="card">
    <h3>Evento 2</h3>
    <p>Data: 22 de junho de 2023</p>
    <p>Descrição: Descrição do Evento 2.</p>
  </div>
  
   <section class="testimonials">
    <h2>Depoimentos</h2>
    <div class="testimonial-container">
      <div class="testimonial">
        <img class="author-photo" src="caminho/para/foto1.jpg" alt="Foto do João Silva">
        <div>
          <div class="author">João Silva</div>
          <div class="content">Participei de um evento incrível! A organização foi impecável e os palestrantes eram muito qualificados. Aprendi muito e com certeza participarei de outros eventos organizados por vocês.</div>
        </div>
      </div>

      <div class="testimonial">
        <img class="author-photo" src="caminho/para/foto2.jpg" alt="Foto da Maria Santos">
        <div>
          <div class="author">Maria Santos</div>
          <div class="content">Utilizo o site há algum tempo e estou muito satisfeita. É fácil de navegar e sempre encontro as informações que preciso. Parabéns pela plataforma!</div>
        </div>
      </div>

      <div class="testimonial">
        <img class="author-photo" src="caminho/para/foto3.jpg" alt="Foto do Carlos Oliveira">
        <div>
          <div class="author">Carlos Oliveira</div>
          <div class="content">Recomendo fortemente o site para todos que buscam eventos de qualidade. Já participei de vários e todos superaram minhas expectativas. Continuem com o ótimo trabalho!</div>
        </div>
      </div>

      <div class="testimonial">
        <img class="author-photo" src="caminho/para/foto4.jpg" alt="Foto da Ana Souza">
        <div>
          <div class="author">Ana Souza</div>
          <div class="content">Adoro participar dos eventos organizados por vocês. Sempre são inspiradores e me permitem ampliar meu networking. Estou ansiosa para o próximo!</div>
        </div>
      </div>
    </div>
  </section>
  
    
	<footer>
		<p>&copy; 2023 Rota Cultural </p> <!-- nome criação e selo do site -->
	</footer>
</body>
</html>
