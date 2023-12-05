<?php
function consulta_do_banco($server, $user, $password, $db, $consulta) {
    // Estabelecer conexão com o banco de dados
    $conexao = new mysqli($server, $user, $password, $db);

    // Verificar se há erros na conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Executar a consulta SQL
    $resultado = $conexao->query($consulta);

    // Verificar se houve erro na consulta
    if (!$resultado) {
        die("Erro na consulta: " . $conexao->error);
    }

    // Fechar a conexão
    $conexao->close();

    return $resultado;
}

?>
