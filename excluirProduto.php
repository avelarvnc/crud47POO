<?php
    include_once("class/Produto.php");
    $p = new Produto();

    $p->excluirProduto($_GET["pid"]);
    echo "Produto excluído";
?>

<a href="formProduto.php">Voltar</a>