<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta Cultural</title>
    <style>
        p {
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #FFB535;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            color: #f5f5f5;
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #f5f5f5;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #BB7804;
        }

        main {
            padding: 20px;
        }

        main h2 {
            margin-bottom: 20px;
        }

        .cta-buttons {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .cta-buttons a {
            color: #fff;
            text-decoration: none;
            padding: 15px 25px;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .cta-buttons a.login {
            background-color: #2ecc71;
        }

        .cta-buttons a.signup {
            background-color: #3498db;
        }

        .cta-buttons a:hover {
            background-color: #485460;
        }

        footer {
            background-color: #FFB535;
            color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }

        /* Popup Styling */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 1;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
        
        .image-container {
        text-align: center;
    }

    .image-container img {
        width: 100%;
        max-width: 100%;
        height: auto;
        border-radius: 8px; /* Optional: Add border-radius for rounded corners */
        margin-top: 20px; /* Adjust the margin as needed */
    }
    
    .main-button {
            display: block;
            margin: 20px auto;
            padding: 15px 25px;
            background-color: #E40060; /* Cor do botão de inscrições */
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .main-button:hover {
            background-color: #AF024B; /* Cor no hover similar ao botão de inscrições */
        }
        
         button.close-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #FFA813;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        button.close-button:hover {
            background-color: #BB7804;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .login-popup,
        .registration-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 2;
        }

        .close-popup-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            background: none;
            border: none;
            cursor: pointer;
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Cesta Cultural</h1>
        <nav>
            <ul>
                <li><a href="#" onclick="showPopup()">Sobre</a></li>
                <li><a href="paginadeimagens.php">Mural</a></li>
                <li><a href="#" onclick="showLoginPopup()">Login</a></li>
                <li><a href="#" onclick="showCadastroPopup()">Cadastro</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p>Descubra novos horizontes e experiências, participe de um evento da Cesta Cultural!</p>
        <div class="image-container">
            <img src="img1.jpeg" alt="Horizontal Image">
        </div>
        <a href="incricoes.html" class="main-button">Participe Agora</a>
    </main>
    <footer>
        <p>&copy; 2022 - Cesta Cultural. Todos os direitos reservados.</p>
    </footer>

    <div class="overlay" onclick="hidePopup()"></div>
    <div class="popup" id="popup">
        <p>Bem-vindo à Rota Cultural: Sua Plataforma de Organização de Eventos Escolares no CEFET-MG!
            Na Rota Cultural, acreditamos no poder transformador dos eventos escolares, e é por isso que criamos uma plataforma dedicada a simplificar e aprimorar a organização dessas experiências educativas. Seja você um educador, aluno ou membro da comunidade escolar, a Rota Cultural está aqui para ajudar a tornar seus eventos inesquecíveis.</p>
        <button class="close-button" onclick="hidePopup()">Fechar</button>
    </div>

    <div class="overlay" onclick="closeLoginPopup(); closeCadastroPopup();"></div>

    <div class="login-popup" id="loginPopup">
        <button class="close-popup-button" onclick="closeLoginPopup()">&#x2716;</button>
        <div class="login-popup-content">
            <h2>Login</h2>
            <p>Insira seus dados para fazer login:</p>
            <form action="login.php" method="POST">
                <label>E-mail</label><input type="text" name="email">
                <label>Senha</label><input type="password" name="senha">
                <button type="submit">Login</button>
            </form>
            <p>Não possui uma conta? <a href="#" onclick="showCadastroPopup()">Cadastrar-se</a></p>
        </div>
    </div>

    <div class="registration-popup" id="cadastroPopup">
        <button class="close-popup-button" onclick="closeCadastroPopup()">&#x2716;</button>
        <div class="registration-popup-content">
            <h2>Cadastro</h2>
            <p>Insira seus dados para se cadastrar:</p>
            <form action="processa.php" method="POST" onsubmit="return validateRegistrationForm()">
                <label>Nome</label><input type="text" name="nome" required>
                <label>E-mail</label><input type="email" name="email" required>
                <label>Telefone</label><input type="tel" id="phone" name="phone" placeholder="Telefone" maxlength="15" pattern="\(\d{2}\) \d{4,5}-\d{4}" oninput="this.value = this.value.replace(/[^0-9() -]/g, '')" onkeypress="formatPhoneNumber(event)" required>
                <label>Nova Senha</label><input type="password" id="password" name="senha" maxlength="10" placeholder="Nova senha" required>
                <i class="password-icon fa fa-eye" onclick="togglePasswordVisibility('password')"></i>
                <label>Confirme a Senha</label><input type="password" id="confirm-password" name="confirm-password" maxlength="10" placeholder="Confirme a senha" required>
                <i class="password-icon fa fa-eye" onclick="togglePasswordVisibility('confirm-password')"></i>
                <label>Tipo de Cadastro</label>
                <input type="radio" name="tipo" value="editor" required> Cadastrar como Editor<br>
                <input type="radio" name="tipo" value="visitante" required> Cadastrar como Visitante<br>
                <button type="submit">Cadastrar</button>
            </form>
            <p>Já possui uma conta? <a href="#" onclick="showLoginPopup()">Faça login</a></p>
        </div>
    </div>


    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.querySelector('.overlay').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
            document.querySelector('.overlay').style.display = 'none';
        }

        function showLoginPopup() {
            document.getElementById('loginPopup').style.display = 'block';
            document.querySelector('.overlay').style.display = 'block';
        }

        function closeLoginPopup() {
            document.getElementById('loginPopup').style.display = 'none';
            document.querySelector('.overlay').style.display = 'none';
        }

        function showCadastroPopup() {
            document.getElementById('cadastroPopup').style.display = 'block';
            document.querySelector('.overlay').style.display = 'block';
        }

        function closeCadastroPopup() {
            document.getElementById('cadastroPopup').style.display = 'none';
            document.querySelector('.overlay').style.display = 'none';
        }
    </script>
</body>
</html>


  <!--  <div class="registration-popup">
        <button class="close-popup-button" onclick="closeRegistrationPopup()">&#x2716;</button>
        <div class="registration-popup-content">
            <h2>Cadastro</h2>
            <p>Insira seus dados para se cadastrar:</p>
            <form action="processa.php" method="POST" onsubmit="return validateRegistrationForm()">
                <label>Nome</label><input type="text" name="nome" required>
                <label>E-mail</label><input type="email" name="email" required>
                <label>Telefone</label><input type="tel" id="phone" name="phone" placeholder="Telefone" maxlength="15" pattern="\(\d{2}\) \d{4,5}-\d{4}" oninput="this.value = this.value.replace(/[^0-9() -]/g, '')" onkeypress="formatPhoneNumber(event)" required>
                <label>Nova Senha</label><input type="password" id="password" name="senha" maxlength="10" placeholder="Nova senha" required>
                <i class="password-icon fa fa-eye" onclick="togglePasswordVisibility('password')"></i>
                <label>Confirme a Senha</label><input type="password" id="confirm-password" name="confirm-password" maxlength="10" placeholder="Confirme a senha" required>
                <i class="password-icon fa fa-eye" onclick="togglePasswordVisibility('confirm-password')"></i>
                <label>Tipo de Cadastro</label>
                <input type="radio" name="tipo" value="editor" required> Cadastrar como Editor<br>
                <input type="radio" name="tipo" value="visitante" required> Cadastrar como Visitante<br>
                <button type="submit">Cadastrar</button>
            </form>
            <p>Já possui uma conta? <a onclick="switchToLoginPopup()">Faça login</a></p>
        </div>
    </div>
    -->
  <!--  <div class="login-popup">
        <div class="login-popup-content">
            <button class="close-popup-button" onclick="closeLoginPopup()">&#x2716;</button>
            <h2>Login</h2>
            <p>Insira seus dados para fazer login:</p>
            <form action="login.php" method="POST">
                <label>E-mail</label><input type="text" name="email">
                <label>Senha</label><input type="password" name="senha">
                <button type="submit">Login</button>
            </form>
            <p>Não possui uma conta? <a href="cadastro.php">Cadastrar-se</a></p>
        </div>
    </div>
    -->
   
