<?php 

    require_once( getcwd() . '/models/game.php');
    require_once( getcwd() . '/models/game.php');
    require_once( getcwd() . '/models/player.php');

    /**
     * Classe de gestão do banco de dados
     */
    class DatabaseConnect{

        //endereço do servidor de banco
        private $host = "localhost";
        //nome da base de dados
        private $db_name = "quake";
        //nome do usuário do banco de dados
        private $user = "root";
        //senha do banco de dados
        private $pass = "";

        //refer~encia a conexão ao banco
        private $db = null;

        /**
         * construtor, inicializa a conexão ao banco
         */
        public function __construct()
        {
            $this->db = @mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);                
            $this->check_connection();
        }

        /**
         * responsável por verificar se a conexão ao banco obteve erro
         */
        private function check_connection()
        {
            if(!$this->db){
                $error = "Erro: Não foi possível conectar a base MySQL." . PHP_EOL . "\n";
                $error .=  mysqli_connect_errno() . PHP_EOL . "\n";
                $error .=  mysqli_connect_error() . PHP_EOL;                

                throw new Exception($error);
            }
        }

        /**
         * função para salvar os jogos no banco de dados
         */
        public function store_game(Game $game)
        {
            if($game instanceof Game){                
                mysqli_query($this->db, 
                    "INSERT INTO partida(nome, total_mortes) VALUES('$game->nome', $game->total_mortes)");                

                $id_partida = mysqli_insert_id($this->db);
                $erros = "";
                foreach( $game->mortes as $m )
                {
                    $erros .= $this->store_deaths($id_partida, $m);

                }
                echo $erros;
            }
        }

        /**
         * função para salvar as mortes de cada partida, processo interno
         */
        private function store_deaths($partida_id, $morte)
        {
            $q = "INSERT INTO morte(partida_id, killer, killed, tipo_morte_id) VALUES ($partida_id,";
            $q .= "(SELECT id FROM jogador WHERE nome = '$morte->killer'),";
            $q .= "(SELECT id FROM jogador WHERE nome = '$morte->killed'),";
            $q .= "(SELECT id FROM tipo_morte WHERE nome = '$morte->mode'));";            
            if( !mysqli_query($this->db, $q) )
                return $q .'<br>' .mysqli_error($this->db) . '<br>';
            else
                return '';
        }

        /**
         * Salva os jogadores na tabela de refer~encia
         */
        public function store_players($players)
        {
            foreach($players as $p){
                mysqli_query($this->db, 
                    "INSERT INTO jogador(nome, total_mortes) VALUES('$p->nome', $p->total_mortes)");                
            }
        }

        /**
         * busca no banco de dados os jogadores e sua quantidade de mortes, devolve um vetor de Player
         */
        public function list_ranking()
        {
            $ranking = array();
            $rslt = mysqli_query($this->db, "SELECT * FROM jogador");

            while($row = mysqli_fetch_object($rslt))
            {
                array_push($ranking, new Player($row->nome, $row->total_mortes));
            }

            return $ranking;
        }

        /**
         * Retorna uma listagem de partidas com a quantidade de mortes, agrupada por tipo de morte
         */
        public function list_deaths()
        {

            $tipos_mortes = array();
            $partidas = array();

            $rslt = mysqli_query($this->db, "SELECT * FROM tipo_morte");

            while($row = mysqli_fetch_object($rslt))
            {
                array_push($tipos_mortes, array( "id" => $row->id, "tipo" => $row->nome, "total" => 0 ));
                
            }


            $rslt = mysqli_query($this->db, "SELECT * FROM partida");

            while($row = mysqli_fetch_object($rslt))
            {
                $partida = new Game($row->nome, $row->total_mortes);
                $partida->mortes = array_slice($tipos_mortes, 0);
                $id_partida = $row->id;

                for($i = 0; $i < sizeof($partida->mortes); $i++){
                    $partida->mortes[$i]['total'] = $this->get_count_deaths($id_partida, $partida->mortes[$i]['id']);
                }

                array_push($partidas, $partida);
            }

            return $partidas;
        }

        /**
         * função interna que retorna a soma da quantidade de mortes por tipo e partida
         */
        private function get_count_deaths($id_partida, $id_tipo_morte)
        {            
            $rslt = mysqli_query($this->db, "SELECT count(*) as total FROM morte where partida_id = $id_partida and tipo_morte_id = $id_tipo_morte");

            $row = mysqli_fetch_object($rslt);

            return $row->total ? $row->total : 0;
        }

        /**
         * função de limpeza da base de dados
         */
        public function clear(){
            mysqli_query($this->db, "TRUNCATE TABLE morte");
            mysqli_query($this->db, "TRUNCATE TABLE jogador");
            mysqli_query($this->db, "TRUNCATE TABLE partida");
        }

        /**
         * Destrutor da classe, finaliza a conexão ao banco de dados
         */
        public function __destruct()
        {
            if($this->db)
                mysqli_close($this->db);
        }

    }

?>