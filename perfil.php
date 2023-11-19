<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="imagens/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Perfil</title>
</head>

<body>
    <div class="container">

        <?php

        echo "Bem-vindo " . $_SESSION['usuario']['nome'] . "<br>";
        echo "<a href='perfil.php'>Perfil</a> - ";
        echo "<a href='logout.php'>Sair</a><br>";

        echo "<h1>Perfil</h1>";

        include_once "conexao.php";

        $query_usuario = "SELECT nome, email, telefone, biografia FROM usuarios WHERE id=? LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bind_param('i', $_SESSION['usuario']['id']);

        $result_usuario->execute();
        $result_usuario->bind_result($nome, $email, $telefone, $biografia);
        
        if ($result_usuario->fetch()) {
            echo "<dl class='row'>";
            echo "<dt class='col-sm-3'>Nome:</dt><dd class='col-sm-9'> $nome </dd>";
            echo "<dt class='col-sm-3'>E-mail:</dt><dd class='col-sm-9'> $email </dd>";
            echo "<dt class='col-sm-3'>Telefone:</dt><dd class='col-sm-9'> $telefone </dd>";
            echo "<dt class='col-sm-3'>Biografia:</dt><dd class='col-sm-9'> $biografia </dd>";
            echo "</dl>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Erro: Não foi possível carregar as informações do perfil.</div>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
</body>

</html>
