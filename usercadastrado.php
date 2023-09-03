<?php

include('protect.php');

?>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
