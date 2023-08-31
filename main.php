<?php
session_start(); // inicia a sessao

include('conexao.php'); // arquivo de conexao com o banco de dados

if (isset($_POST['email']) && isset($_POST['senha'])) { // Verifica se os campos 'email' e 'senha' foram enviados via POST

    $email = $mysqli->real_escape_string($_POST['email']); 
    $senha = $mysqli->real_escape_string($_POST['senha']); // proteção contra sql injection

    if (empty($email)) { // Verifica se o campo 'email' está vazio
        echo "Preencha seu e-mail";
    } elseif (empty($senha)) { // Verifica se o campo 'senha' está vazio
        echo "Preencha sua senha";
    } else {
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; // Monta a consulta SQL para verificar as credenciais
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error); // Executa a consulta SQL

        $quantidade = $sql_query->num_rows; // Obtém o número de linhas retornadas pela consulta

        if ($quantidade == 1) { // Se uma linha for retornada, o login é bem-sucedido

            $usuario = $sql_query->fetch_assoc(); // Obtém os dados do usuário do resultado da consulta

            $_SESSION['id'] = $usuario['id']; // Define a variável de sessão 'id'
            $_SESSION['nome'] = $usuario['nome']; // Define a variável de sessão 'nome'

            header("Location: painel.php"); // Redireciona para a página 'painel.php' após o login bem-sucedido

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos"; // Exibe uma mensagem de erro se o login falhar
        }
    }
}
?>


<html>
<head>
 
    <style>
        body {
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

        .registration-popup {
            display: none;
            text-align: center;
            align-items: center;
            background-color: #FFF;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            height: auto;
            overflow: auto;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .registration-popup-content {
            text-align: center;
        }

        .registration-popup-content h2 {
            font-size: 24px;
            color: #001744;
        }

        .registration-popup-content p {
            font-size: 16px;
            color: #888;
            margin-bottom: 10px;
        }

        .registration-popup-content form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .registration-popup-content input[type="text"],
        .registration-popup-content input[type="tel"],
        .registration-popup-content input[type="email"],
        .registration-popup-content input[type="password"] {
            width: 300px;
            height: 40px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #888;
            border-radius: 5px;
        }
        .registration-popup-content input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 1px solid #000;
            border-radius: 0;
            width: 14px;
            height: 14px;
            display: flex;
            align-items: center;
        }
        .registration-popup-content input[type="radio"]:checked {
            background-color: blue;
}


        .registration-popup-content button[type="submit"] {
            width: 200px;
            height: 40px;
            background-color: #001744;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .registration-popup-content button[type="submit"]:hover {
            background-color: #9FA2A8;
        }

        .registration-popup-content p a {
            color: #001744;
        }

        .registration-popup-content p a:hover {
            text-decoration: underline;
        }
        
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color:  #001744;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        /*login*/
        .login-popup {
            display: none;
            text-align: center;
            align-items: center;
            background-color: #FFF;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            height: auto;
            overflow: auto;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .login-popup-content {
            text-align: center;
        }

        .login-popup-content h2 {
            font-size: 24px;
            color: #001744;
        }

        .login-popup-content p {
            font-size: 16px;
            color: #888;
            margin-bottom: 10px;
        }

        .login-popup-content form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-popup-content input[type="email"],
        .login-popup-content input[type="password"] {
            width: 300px;
            height: 40px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #888;
            border-radius: 5px;
        }

        .login-popup-content button[type="submit"] {
            width: 200px;
            height: 40px;
            background-color: #001744;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .login-popup-content button[type="submit"]:hover {
            background-color: #9FA2A8;
        }
        
        .login-popup-content p a {
            color: #001744;
        }
        
        .login-popup-content p a:hover {
            text-decoration: underline;
        }
        
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color:  #001744;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        
       .popup {
    background-color: #FFF;
    border-radius: 10px;
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    max-width: 500px;
    text-align: justify;
    border: 1px solid #001744;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    background: none;
    border: none;
    cursor: pointer;
    color: #001744;
}

.close-button:focus {
    outline: none;
}

.popup.show {
    display: block;
}

.popup h2 {
    color: #001744;
    text-align: center;
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
        window.addEventListener('scroll', function() {
            var element = document.querySelector('.about-section');
            var position = element.getBoundingClientRect().top;
            var windowHeight = window.innerHeight;

            if (position < windowHeight) {
                element.classList.add('appear');
            }
        });

       window.addEventListener('scroll', function() {
    var footer = document.querySelector('.footer');
    var position = window.innerHeight + window.scrollY;
    var documentHeight = document.body.offsetHeight;

    if (position >= documentHeight) {
        footer.classList.add('show');
    } else {
        footer.classList.remove('show');
    }
});

window.addEventListener('DOMContentLoaded', function() {
    var footer = document.querySelector('.footer');
    var documentHeight = document.body.offsetHeight;
    var windowHeight = window.innerHeight;

    if (documentHeight <= windowHeight) {
        footer.classList.add('show');
    }
});


        
        function formatPhoneNumber(event) {
                var phoneInput = event.target;
                var key = event.key;
                var phone = phoneInput.value;

                if (key !== "Backspace" && key !== "Delete") {
                    if (phone.length === 2) {
                        phoneInput.value = "(" + phone + ") ";
                    } else if (phone.length === 10) {
                        phoneInput.value = phone + "-";
                    }
                }
        }

        function removeNumbers(event) {
            var input = event.target;
            input.value = input.value.replace(/[0-9]/g, '');
        }

        function removeNumbers(event) {
            var input = event.target;
            input.value = input.value.replace(/[0-9]/g, '');
        }

        function openRegistrationPopup() {
            var registrationPopup = document.querySelector('.registration-popup');
            registrationPopup.style.display = 'block';
        }

        function closeRegistrationPopup() {
            var registrationPopup = document.querySelector('.registration-popup');
            registrationPopup.style.display = 'none';
        }
        
        function openLoginPopup() {
            var loginPopup = document.querySelector('.login-popup');
            loginPopup.style.display = 'block';
        }

        function closeLoginPopup() {
            var loginPopup = document.querySelector('.login-popup');
            loginPopup.style.display = 'none';
        }
        
        
         function validateRegistrationForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;

            // Verifica se o nome está preenchido
            if (name.trim() === "") {
                alert("Por favor, digite o seu nome.");
                return false;
            }

            // Verifica se o email é válido
            if (!isValidEmail(email)) {
                alert("Por favor, digite um endereço de email válido.");
                return false;
            }

            // Verifica se o telefone está preenchido
            if (phone.trim() === "") {
                alert("Por favor, digite o seu número de telefone.");
                return false;
            }

            // Verifica se a senha atende aos requisitos
            if (!isValidPassword(password)) {
                alert("A senha deve ter no mínimo 6 caracteres, com pelo menos uma letra minúscula, uma letra maiúscula, um caractere especial e o restante números.");
                return false;
            }

            // Verifica se as senhas coincidem
            if (password !== confirmPassword) {
                alert("As senhas não coincidem. Por favor, digite novamente.");
                return false;
            }

            // Redirecionar para a próxima página após a validação do formulário
            window.location.href = "pg.jsp";
            return false; // Evitar que o formulário seja enviado
        }

        // Função para validar o formato do email
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Função para validar a senha
        function isValidPassword(password) {
            // Verifica o tamanho mínimo da senha
            if (password.length < 6 || password.length > 8) {
                return false;
            var lowercaseRegex = /[a-z]/;
            var uppercaseRegex = /[A-Z]/;
            var specialCharRegex = /[!@#$%^&*]/;
            var numberRegex = /[0-9]/;
            return lowercaseRegex.test(password) && uppercaseRegex.test(password) && specialCharRegex.test(password) && numberRegex.test(password);
        }
            }
        function switchToLoginPopup() {
            closeRegistrationPopup();
            openLoginPopup();
        }
        
        function switchToRegistrationPopup() {
            closeLoginPopup();
            openRegistrationPopup();
        
         }
       function openPopup() {
    var popup = document.getElementById("popup");
    popup.classList.add("show");
}

function closePopup() {
    var popup = document.getElementById("popup");
    popup.classList.remove("show");
}

    </script>
</head>
<body>
   
    <div class="container">
    <div class="button-container">
        <a onclick="openRegistrationPopup()" class="button">Cadastro</a>
        <a onclick="openLoginPopup()" class="button">Login</a>
        
    </div>
        <h1>Bem-vindo ao Rota Cultural</h1>
        <p>Descubra novos horizontes artísticos com a Rota Cultural: o programa escolar que leva você a uma viagem pelo conhecimento.</p>
        <div class="image-container">
            <img src="https://static5.vvale.com.br/wp-content/uploads/2017/03/DSC09145.jpg" alt="Imagem">
        </div>
        <h2>Faça seu cadastro e garanta sua participação em todos os eventos.</h2>
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

    <button class="help-button" onclick="openPopup()">Sobre o site</button>

        <div class="popup" id="popup">
            <div class="popup-content">
                <button class="close-button" onclick="closePopup()">&#x2716;</button>
                <h2>Bem-vindo ao Rota Cultural</h2>
                <p>O seu portal de referência para a organização de eventos culturais nas escolas. Aqui, você encontrará recursos e ferramentas para planejar e realizar eventos culturais nas escolas, incluindo apresentações de teatro, concertos, exposições de arte e muito mais. Estamos empenhados em tornar a experiência cultural nas escolas mais acessível e inspiradora para todos os envolvidos. Juntos, podemos trazer a magia da cultura para as escolas e enriquecer a jornada educacional dos estudantes.</p>
            </div>
        </div>
    

    <div class="registration-popup">
        <button class="close-button" onclick="closeRegistrationPopup()">&#x2716;</button>
        <div class="registration-popup-content">
            <h2>Cadastro</h2>
            <p>Insira seus dados para se cadastrar:</p>
            <form onsubmit="return validateRegistrationForm()">
                
                <label>Nome</label><input type="text" name="Nome">
                <label>E-mail</label><input type="text" name="email">
              <!--  <input type="text" placeholder="Nome" required>
                <input type="text" placeholder="email" required> -->
                <label>Telefone</label><input type="tel" id="phone" name="phone" placeholder="Telefone" maxlength="15" pattern="\(\d{2}\) \d{4,5}-\d{4}" oninput="this.value = this.value.replace(/[^0-9() -]/g, '')" onkeypress="formatPhoneNumber(event)" required>
                <input type="password" id="password" name="senha" maxlength="10" placeholder="Nova senha" required>
                <i class="password-icon fa fa-eye" onclick="togglePasswordVisibility('password')"></i>
                <input type="password" id="confirm-password" name="confirm-password" maxlength="10" placeholder="Confirme a senha" required>
                <i class="password-icon fa fa-eye" onclick="togglePasswordVisibility('confirm-password')"></i>
                <input type="radio" name="tipo" value="editor"> Cadastrar como Editor<br>
                <input type="radio" name="tipo" value="visitante"> Cadastrar como Visitante<br>
                <button type="submit">Cadastrar</button>
                
            </form>
            <p>Já possui uma conta? <a onclick="switchToLoginPopup()">Faça login</a></p>
        </div>
        </div>
        
    <div class="login-popup">
     <!--   <button class="close-button" onclick="closeLoginPopup()">&#x2716;</button> -->
        <div class="login-popup-content">
            <h2>Login</h2>
            <p>Insira seus dados para fazer login:</p>
            <form action="" method="POST"> <!-- o metodo tem q ser post pra funcionar na conexao com o banco de dados, verificar se ta funcionando esse login -->
                <label>E-mail</label><input type="text" name="email">
                <label>Senha</label><input type="password" name="senha">
                <!--<input type="text" placeholder="email" required>
                <input type="password" placeholder="senha" required> -->
              \*  <button type="submit">Login</button> *\
            </form>
            <p>Não possui uma conta? <a onclick="switchToRegistrationPopup()">Cadastra-se</a></p>
        </div>
        </div>
    
	<footer>
		<p>&copy; 2023 Rota Cultural </p> <!-- nome criação e selo do site -->
	</footer>
</body>
</html>
