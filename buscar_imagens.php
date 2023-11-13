<?php
// ... Conexão com o banco de dados ...

$sql = "SELECT nome_arquivo FROM imagens";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $imagens = [];
    while ($linha = $resultado->fetch_assoc()) {
        $imagens[] = $linha;
    }
    echo json_encode($imagens);
} else {
    echo "0 resultados";
}

$conexao->close();
//SELECT nome_arquivo FROM imagens: Seleciona todos os nomes de arquivo da tabela de imagens.
//$resultado = $conexao->query($sql): Executa a consulta SQL.
//while ($linha = $resultado->fetch_assoc()): Itera sobre as linhas do resultado da consulta e armazena os nomes dos arquivos no array $imagens.
//echo json_encode($imagens): Converte o array de nomes de arquivo para formato JSON e imprime na resposta.
?>
