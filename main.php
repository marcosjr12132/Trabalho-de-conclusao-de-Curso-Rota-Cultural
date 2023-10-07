<?php
session_start(); // Inicia a sessão

include('conexao.php'); // Arquivo de conexão com o banco de dados

//if (isset($_POST['email']) && isset($_POST['senha'])) { // Verifica se os campos 'email' e 'senha' foram enviados via POST

   // $email = $mysqli->real_escape_string($_POST['email']); 
    //$senha = $mysqli->real_escape_string($_POST['senha']); // Proteção contra SQL injection

    //if (empty($email)) { // Verifica se o campo 'email' está vazio
        //echo "Preencha seu e-mail";
    //} elseif (empty($senha)) { // Verifica se o campo 'senha' está vazio
        //echo "Preencha sua senha";
    //} else {
        //$sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; // Monta a consulta SQL para verificar as credenciais
        //$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error); // Executa a consulta SQL

        //$quantidade = $sql_query->num_rows; // Obtém o número de linhas retornadas pela consulta

        //if ($quantidade == 1) { // Se uma linha for retornada, o login é bem-sucedido

            //$usuario = $sql_query->fetch_assoc(); // Obtém os dados do usuário do resultado da consulta

            //$_SESSION['id'] = $usuario['id']; // Define a variável de sessão 'id'
            //$_SESSION['nome'] = $usuario['nome']; // Define a variável de sessão 'nome'

            // Agora você tem as informações do usuário nas variáveis de sessão,
            // mas não precisa exibi-las diretamente na página.

            //header("Location: usercadastrado.php");
            //exit(); // Adicionado para evitar que o restante do código seja executado após a redireção

        //} else {
            //cho "Falha ao logar! E-mail ou senha incorretos"; // Exibe uma mensagem de erro se o login falhar
        //}
    //}
//}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Rota cultural</title>
    <script src="main.js" defer></script>

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
  
<!-- Adicione isso ao seu HTML onde você deseja exibir o formulário de depoimento -->
<div class="depoimento-form">
    <h2>Deixe seu Depoimento</h2>
    <form action="processa_depoimento.php" method="POST" enctype="multipart/form-data">
        <?php
        // Verifica se o usuário está logado
        if (isset($_SESSION['nome']) && isset($_SESSION['caminho_perfil'])) {
            // Se estiver logado, exibe a foto de perfil e nome do usuário
            echo '<img src="' . $_SESSION['caminho_perfil'] . '" alt="Foto de Perfil">';
            echo '<input type="hidden" name="nome" value="' . $_SESSION['nome'] . '">';
            echo '<input type="hidden" name="caminho_perfil" value="' . $_SESSION['caminho_perfil'] . '">';
        }
        ?>

        <label>Depoimento</label>
        <textarea name="depoimento" rows="4" required></textarea>

        <button type="submit">Enviar Depoimento</button>
    </form>
</div>


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

            </form>
            <p>Já possui uma conta? <a onclick="switchToLoginPopup()">Faça login</a></p>
        </div>
        </div>
        
    <div class="login-popup">
     <!--   <button class="close-button" onclick="closeLoginPopup()">&#x2716;</button> -->
        <div class="login-popup-content">
            <h2>Login</h2>
            <p>Insira seus dados para fazer login:</p>
            <form action="login.php" method="POST">
    <label>E-mail</label><input type="text" name="email">
    <label>Senha</label><input type="password" name="senha">
    <button type="submit">Login</button>
</form>
            <p>Não possui uma conta? <a onclick="switchToRegistrationPopup()">Cadastra-se</a></p>
        </div>
        </div>
    
	<footer>
		<p>&copy; 2023 Rota Cultural </p> <!-- nome criação e selo do site -->
	</footer>
</body>
</html>
