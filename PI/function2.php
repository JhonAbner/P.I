<?php
function consulta_do_banco($server, $user, $password, $db, $consulta) {
    $conexao = new mysqli($server, $user, $password, $db);
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }
    $resultado = $conexao->query($consulta);
    if (!$resultado) {
        die("Erro na consulta: " . $conexao->error);
    }
    $conexao->close();

    return $resultado;
}

?>
