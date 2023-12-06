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

        public function getNome(){
            return $this->nome;
        }

        public function getValor()
        {
            return $this->valor;
        }

        public function getCategoria()
        {
            return $this->categoria;
        }

        public function setNome($_nome)
        {
            $this->nome = $_nome;
        }

        public function setValor($_valor)
        {
            $this->valor = $_valor;
        }

        public function setCategoria($_categoria)
        {
            $this->categoria = $_categoria;
        }

        public function inserirProduto()
        {
            try 
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
            catch (Exception $e) 
            {
                return false;
            }
           

        }

        public function listarProduto()
        {
           try {
                include("assets/db/conn.php");

                $sql = "CALL psListarProduto('')";
                $data = $conn->query($sql)->fetchAll();

                return $data;
           } 
           catch (Exception $e) 
           {
               return false;
           }
            

      
        }

        public function buscarProduto($_id)
        {
            include("assets/db/conn.php");

            $sql = "CALL psProduto('$_id')";
            $data = $conn->query($sql)->fetchAll();

            foreach ($data as $item) {
                $this->nome = $item["nomeProduto"];
                $this->valor = $item["valorUnitario"];
                $this->categoria = $item["nomeCategoria"];
            }

            return true;

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

        public function atualizarProduto($_id)
        {
            include("assets/db/conn.php");
            $sql = "CALL puProduto(:id, :nome, :valor)";

            $data = [
                'id' => $_id,
                'nome' => $this->nome,
                'valor' => $this->valor
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }

    }

?>