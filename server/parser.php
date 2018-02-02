<?php
    require_once './utils/uploader.php';
    require_once './utils/reader.php';
    require_once './models/game.php';
    require_once './models/player.php';

    class Parser
    {
        private $uploader = null;
        private $reader = null;
        private $games;
        
        public function __construct()
        {
            $this->games = array();
            $this->uploader = new UploaderLog('log_file');            
        }

        public function convert()
        {            
            if( $this->uploader->upload_file() )
            {
                $this->reader = new LogReader($this->uploader->get_file_path());
                $this->games = $this->reader->read_games();
                $this->save();

            }else{
                echo $this->uploader->get_erro();
            }
        }

        public function save()
        {
            echo sizeof($this->games);
            echo '<br>-----------<br>';
            foreach( $this->games as $g){
                var_dump($g);
                echo '<br>-----------<br>';
            }            
        }

    }

    $parser = new Parser();
    $parser->convert();

?>