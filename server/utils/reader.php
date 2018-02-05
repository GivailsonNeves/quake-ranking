<?php   

    require_once( getcwd() . '/models/game.php');
    require_once( getcwd() . '/models/player.php');  

    /**
     * Classe responsável pelo mapeamento e extração das informações códidas no arquivo de log
     */
    class LogReader{
        
        //Local no servidor onde o arquivo está
        private $file_path;
        //vetor contendo todos os jogos mapeados
        private $games;
        //vetor contendo todos os jogadores
        private $players;

        /**
         * Construtor da classe, recebe o caminho (no servidor) onde o arquivo de logs está
         */
        public function __construct($file_path)
        {
            $this->file_path = $file_path;
            $this->games = array();
            $this->players = array();
        }

        /**
         * executa o processo de estração de dados do arquivo de log e prepara os vetores de games e players
         */
        public function read()
        {
            $file = fopen($this->file_path, 'r');

            $game = null;
            $coutGames = 1;            

            while($line = fgets($file)){
                if( strrpos($line, "InitGame") !== false ){
                    if($game) array_push($this->games, $game);

                    $game = new Game("jogo ".($coutGames++));                   
                }
                if(strrpos($line, "Kill")  !== false ){                    
                    $info = substr($line, strrpos($line, ":") + 2);
                    
                    $killer = $this->extractRegex("/^(.*?) killed\s/",$info);                    
                    $killed =  $this->extractRegex("/killed (.*?) by\s/",$info);                    
                    $mode = $this->extractRegex("/by (.*)$/",$info);

                    $game->increment_mortes($killer, $killed, $mode);

                    $this->push_player($killer, $killed);                    
                }
                
            }
            
            fclose($file);

            array_push($this->games, $game);
        }

        /**
         * Popula o vetor de jogadores e pontua ou penaliza o jogador pela ação realizada, se morreu ou se matou
         */
        private function push_player($killer, $killed)
        {            
            
            $_killer = $this->find_player($killer);
            $_killed = $this->find_player($killed);
            
            if(!$_killed){
                $_killed = new Player($killed);
                array_push($this->players, $_killed);
            }

            if($killer != '<world>'){                
                if(!$_killer){
                    $_killer = new Player($killer);
                    array_push($this->players, $_killer);
                }                
                $_killer->increment_mortes();
            }else{                
                $_killed->decrement_mortes();                
            }
        }      

        /**
         * retorna o vetor de games
         */
        public function get_games()
        {
            return $this->games;
        }

        /**
         * retorna o vetor de jogadores
         */
        public function get_players()
        {
            return $this->players;
        }

         /**
         * Localiza o jogador no vetor de jogadores e devolve o encontrado, caso não retorna null
         */
        private function find_player($player){
            
            for($i = 0; $i < sizeof($this->players); $i++)
            {
                if($this->players[$i]->nome == $player)
                    return $this->players[$i];
            }
            return null;
        }

        /**
         * extrai o texto baseado em um pattern regex e devolve o valor limpo da string
         */
        private function extractRegex($pattern, $info)
        {
            $matches = array();
            preg_match($pattern, $info, $matches);
            return $matches[1];
        }

    }
?>