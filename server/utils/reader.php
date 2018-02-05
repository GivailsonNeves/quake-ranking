<?php   

    require_once( getcwd() . '/models/game.php');
    require_once( getcwd() . '/models/player.php');  

    class LogReader{
        
        private $file_path;
        private $games;
        private $players;

        public function __construct($file_path)
        {
            $this->file_path = $file_path;
            $this->games = array();
            $this->players = array();
        }

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

        private function find_player($player){
            
            for($i = 0; $i < sizeof($this->players); $i++)
            {
                if($this->players[$i]->nome == $player)
                    return $this->players[$i];
            }
            return null;
        }

        public function get_games()
        {
            return $this->games;
        }

        public function get_players()
        {
            return $this->players;
        }

        private function extractRegex($pattern, $info)
        {
            $matches = array();
            preg_match($pattern, $info, $matches);
            return $matches[1];
        }

    }
?>