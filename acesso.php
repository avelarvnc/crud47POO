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

    <h1>Acesso</h1>

    <form method="POST">

        <label>Usuário:</label>
        <input type="text" name="usuario" minlength="3" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" minlength="3" required><br><br>

        <input type="submit" name="acessar" value="Acessar">

        <?php

            if (isset($_REQUEST["acessar"]))
            {
                $u = new Usuario();
                $u->create($_REQUEST["usuario"], $_REQUEST["senha"]);

                if ($u->autenticarUsuario() == 0)
                {
                    echo "<p>Usuário e/ou senha incorreto(s).</p>";                   
                }
                else {
                    ////Utilizando dados em sessão
                    // session_start();
                    // $_SESSION["nome"] = $u->getUsuario();
                    // header("Location: areaRestrita.php"); //redirecionando para outra página

                    $cookieName = "nome";
                    $cookieValue = $u->getUsuario();
                    setcookie($cookieName, $cookieValue, time() + 86400, "/");
                    header("Location: areaRestrita.php");
                }
            }
            

        ?>

    </form>


    
</body>
</html>