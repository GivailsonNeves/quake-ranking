<?php     
    class LogReader{
        
        private $file_path;
        private $games;

        public function __construct($file_path)
        {
            $this->file_path = $file_path;
            $this->games = array();
        }

        public function read_games()
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
                }
                
            }

            fclose($file);

            array_push($this->games, $game);

            return $this->games;
        }

        private function extractRegex($pattern, $info)
        {
            $matches = array();
            preg_match($pattern, $info, $matches);
            return $matches[1];
        }

    }
?>