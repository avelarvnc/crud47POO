<?php
    include_once("class/Produto.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $p = new Produto();
        $p->buscarProduto($_GET["pid"]);

        echo "
            <form method='POST'>

            <label>Nome:</label>
            <input type='text' name='nome' minlength='3' value='" . $p->getNome() . "' required><br><br>

            <label>Valor:</label>
            <input type='text' name='valor' minlength='3' value='" . $p->getValor() . " ' required><br><br>

            <label>Categoria:</label>
            <input type='text' name='categoria' minlength='3' value='" . $p->getCategoria() . "' required><br><br>

            <input type='submit' name='atualizar' value='Atualizar'>
        ";

        if ( isset($_REQUEST["atualizar"]) ) //evitar que o procedimento seja executado sem apertar o botão
        {
           
            $p->setNome($_REQUEST["nome"]);
            $p->setValor($_REQUEST["valor"]);

            echo $p->atualizarProduto($_GET["pid"]) == true ?
                    "<p>Produto cadastrado.</p>" :
                    "<p>Ocorreu um erro.</p>";
        }
    ?>

</form>
</body>
</html>