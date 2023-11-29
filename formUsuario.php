<?php
    include_once("class/Usuario.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/estilo.css" rel="stylesheet">
    <script src="assets/js/util.js"></script>
</head>
<body>

    <h1>Usuários</h1>
    <h2>Novo usuário</h2>

    <form method="POST">

        <label>Usuário:</label>
        <input type="text" name="usuario" minlength="3" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" minlength="3" required><br><br>

        <input type="submit" name="inserir" value="Inserir">

        <?php

            if ( isset($_REQUEST["inserir"]) ) //evitar que o procedimento seja executado sem apertar o botão
            {
                $u = new Usuario(); //criar objeto da classe Produto
                $u->create($_REQUEST["usuario"], $_REQUEST["senha"]); // encapsular os valores do form no objeto produto
                
                echo $u->inserirUsuario() == true ?
                        "<p>Usuário cadastrado.</p>" :
                        "<p>Ocorreu um erro.</p>";
            }
        ?>

    </form>


    
</body>
</html>