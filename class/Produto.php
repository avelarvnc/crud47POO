<?php

    class Produto
    {

        private $nome;
        private $valor;
        private $categoria;

        public function __construct(){}

        public function create($_nome, $_valor, $_categoria)
        {
            $this->nome = $_nome;
            $this->valor = $_valor;
            $this->categoria = $_categoria;
        }

        public function inserirProduto()
        {
            include("assets/db/conn.php");
            $sql = "CALL piProduto(:nome, :valor, :categoria)";

            $data = [
                'nome' => $this->nome,
                'valor' => $this->valor,
                'categoria' => $this->categoria
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;

        }

        public function listarProduto()
        {
            include("assets/db/conn.php");

            $sql = "CALL psListarProduto('')";
            $data = $conn->query($sql)->fetchAll();

            return $data;
        }

        public function excluirProduto($_id)
        {
            include("assets/db/conn.php");
            $sql = "CALL pdProduto(:id)";

            $data = [
                'id' => $_id
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }

    }

?>