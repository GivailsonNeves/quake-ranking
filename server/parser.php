<?php

    require_once( getcwd() . '/utils/uploader.php');
    require_once( getcwd() . '/utils/reader.php');
    require_once( getcwd() . "/database/database.php");

    class Parser
    {
        private $uploader = null;
        private $reader = null;
        private $games;
        private $players;
        private $db = null;
        
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
                $this->reader->read();
                $this->games = $this->reader->get_games();
                $this->players = $this->reader->get_players();
                $this->save();

            }else{
                echo $this->uploader->get_erro();
            }
        }

        public function save()
        {           
            try{                    

                $this->db = new DatabaseConnect();                               
                $this->db->clear();

                $this->db->store_players($this->players);
                
                foreach( $this->games as $g){
                    $this->db->store_game($g);
                }   
        
            } catch( Exception $e){
                echo $e->getMessage();
            }   
        }

    }

    $parser = new Parser();
    $parser->convert();

?>