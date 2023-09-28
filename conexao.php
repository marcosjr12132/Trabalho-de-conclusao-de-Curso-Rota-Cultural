<?php

$usuario = 'root';
$senha = '';
$bancodedados= 'cadastro';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $bancodedados);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>
