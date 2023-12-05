<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Área restrita</h1>

    <?php
        ////Verificação de variável de sessão
        // session_start();
        // if (isset($_SESSION["nome"]))
        // {
        //     echo "<p>Olá, " . $_SESSION["nome"] . "</p>";
        // }
        // else {
        //     header("Location: acesso.php");
        // }

        if (isset($_COOKIE["nome"]))
        {
            echo "<p>Olá, " . $_COOKIE["nome"] . "</p>";
        }
        else {
            header("Location: acesso.php");
        }
        
        
    ?>

    <a href="formProduto.php">Produtos</a>
    <a href="sair.php">Sair</a>
</body>
</html>