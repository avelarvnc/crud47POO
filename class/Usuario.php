<?php

    class Usuario{

        private $usuario;
        private $senha;

        public function __construct(){}

        public function create($_usuario, $_senha)
        {
            $this->usuario = $_usuario;
            $this->senha = md5($_senha);
        }

        public function getUsuario()
        {
            return $this->usuario;
        }

        public function inserirUsuario()
        {
            include("assets/db/conn.php");
            $sql = "CALL piUsuario(:usuario, :senha)";

            $data = [
                'usuario' => $this->usuario,
                'senha' => $this->senha
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }

        public function autenticarUsuario()
        {

                include("assets/db/conn.php");
                $sql = "CALL psLoginUsuario('$this->usuario', '$this->senha')";
                $stmt = $conn->prepare($sql);

                $stmt->execute(); 
                
                if ($user = $stmt->fetch()) //se encontrar registro
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
              

        }

    }

?>