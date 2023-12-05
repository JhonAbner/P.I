<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="alterar1">
        <form class="change-password-form" method="post" action="alterar_senha.php">
            <h1>Alterar Senha</h1>
            <label for="senha_atual">Senha Atual:</label>
            <input type="password" name="senha_atual" id="senha_atual" class="input-field">
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" name="nova_senha" id="nova_senha" class="input-field">
            <label for="confirmar_senha">Confirmar Nova Senha:</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha" class="input-field">
            <input type="submit" name="alterar_senha" value="Alterar Senha" class="change-password-button">
            <?php
                include "function.php";
                include "function2.php";

                if (isset($_POST['alterar_senha'])) {
                    $senha_atual = $_POST['senha_atual'];

                    // Consulta para verificar se a senha atual está correta
                    $consulta = "SELECT * FROM `discentes` WHERE `SENHA` = '$senha_atual'";
                    $resultado = consulta_do_banco($server, $user, $password, $db, $consulta);

                    if ($resultado === "senha_incorreta") {
                        echo "A senha atual está incorreta.";
                    } else {
                        if ($resultado->num_rows > 0) {
                            $nova_senha = $_POST['nova_senha'];
                            $confirmar_senha = $_POST['confirmar_senha'];
                            
                            if ($nova_senha == $confirmar_senha) {
                                
                                $consulta_atualizar_senha = "UPDATE `discentes` SET `SENHA` = '$nova_senha' WHERE `SENHA` = '$senha_atual'";
                                $resultado_atualizar_senha = consulta_do_banco($server, $user, $password, $db, $consulta_atualizar_senha);

                                if ($resultado_atualizar_senha) {
                                    echo "Senha alterada com sucesso";
                                    exit();
                                } else {
                                    echo "A senha não pôde ser alterada.";
                                }
                            } else {
                                echo "A nova senha e a confirmação não coincidem.";
                            }
                        } else {
                            echo "A senha atual está incorreta.";
                        }
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>
