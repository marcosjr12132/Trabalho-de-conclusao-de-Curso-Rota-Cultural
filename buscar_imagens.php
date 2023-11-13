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
?>
