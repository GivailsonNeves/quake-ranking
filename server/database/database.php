<?php 

    class DatabaseConnect{
        private $host = "localhost";
        private $db = "quake";
        private $user = "root";
        private $pass = "";

        private $connection = null;

        public function __construct()
        {
            $this->connection = @mysqli_connect($this->host, $this->user, $this->pass, $this->db);                
            $this->check_connection();
        }
        private function check_connection()
        {
            if(!$this->connection){
                $error = "Erro: Não foi possível conectar a base MySQL." . PHP_EOL . "\n";
                $error .=  mysqli_connect_errno() . PHP_EOL . "\n";
                $error .=  mysqli_connect_error() . PHP_EOL;                

                throw new Exception($error);
            }
        }


        public function __destruct()
        {
            if($this->connection)
            mysqli_close($this->connection);
        }

    }

?>