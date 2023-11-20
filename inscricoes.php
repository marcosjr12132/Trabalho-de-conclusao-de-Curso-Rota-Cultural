<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação dos campos do formulário
    $nome = test_input($_POST["nome"]);
    $email = test_input($_POST["email"]);

    // Aqui você pode adicionar mais validações conforme necessário

    // Processamento adicional (exemplo: envio de e-mail, salvamento em banco de dados, etc.)

    // Exemplo simples de resposta
    echo "Obrigado por se inscrever, $nome!";
}

// Função para validar dados
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
