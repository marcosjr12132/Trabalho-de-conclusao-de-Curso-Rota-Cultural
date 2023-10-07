<?php
// Inicializa a sessão
session_start();
require_once 'conexao.php';
// Inclui o arquivo de configuração
//Ksrequire_once 'config.php';

// Define variáveis e inicializa com valores vazios
$email = $senha = '';
$email_err = $senha_err = '';

// Processa os dados do formulário quando o formulário é enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o email está vazio
    if (empty(trim($_POST['email']))) {
        $email_err = 'Por favor, insira seu email.';
    } else {
        $email = trim($_POST['email']);
    }

    // Verifica se a senha está vazia
    if (empty(trim($_POST['senha']))) {
        $senha_err = 'Por favor, insira sua senha.';
    } else {
        $senha = trim($_POST['senha']);
    }

    // Valida as credenciais
    if (empty($email_err) && empty($senha_err)) {
        $sql = 'SELECT id, email, password FROM users WHERE email = ?';

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('s', $param_email);
            $param_email = $email;

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $email, $hashed_password);

                    if ($stmt->fetch()) {
                        if (password_verify($senha, $hashed_password)) {
                            // A senha está correta, inicia uma nova sessão
                            session_start();

                            // Armazena dados em variáveis de sessão
                            $_SESSION['id'] = $id;
                            $_SESSION['email'] = $email;

                            // Redireciona o usuário para a página de boas-vindas
                            header('location: welcome.php');
                        } else {
                            // Exibe uma mensagem de erro se a senha não for válida
                            $senha_err = 'Senha inválida.';
                        }
                    }
                } else {
                    // Exibe uma mensagem de erro se o email não existir
                    $email_err = 'Nenhuma conta encontrada com esse email.';
                }
            } else {
                echo 'Ops! Algo deu errado. Por favor, tente novamente mais tarde.';
            }

            // Fecha a declaração
            $stmt->close();
        }
    }

    // Fecha a conexão
    $mysqli->close();
}
?>
