<?php 
    require_once( getcwd() . '/utils/uploader.php');
    require_once( getcwd() . '/utils/reader.php');
    require_once( getcwd() . "/database/database.php");

    /**
     * Trata o recebimento do formulário de envio do arquivo de log e delega as funções de intepretação e guarda dos dados.
     */
    class Parser
    {
        //referência a classe de upload
        private $uploader = null;
        //referêcia a classe de leitura de arquivo
        private $reader = null;
        //vetor de jogos
        private $games;
        //vetor de jogadores
        private $players;
        //referência a classe de gestão de banco de dados
        private $db = null;
        
        /**
         * construtor Inicializa a classe de upload
         */
        public function __construct()
        {
            $this->games = array();
            $this->uploader = new UploaderLog('log_file'); 
        }

        /**
         * Inicia o processo de upload do arquivo e de leitura dos dados
         */
        public function convert()
        {            
            if( $this->uploader->upload_file() )
            {
                $this->reader = new LogReader($this->uploader->get_file_path());
                $this->reader->read();
                $this->games = $this->reader->get_games();
                $this->players = $this->reader->get_players();
                return $this->save();

            }else{
                return $this->uploader->get_erro();
            }
        }

        /**
         * Delega o salvamento dos dados extraidos na base de dados utilizando a classe de Banco de dados
         */
        public function save()
        {           
            try{                    

                $this->db = new DatabaseConnect();                               
                $this->db->clear();

                $this->db->store_players($this->players);
                
                foreach( $this->games as $g){
                    $this->db->store_game($g);
                }   

                return "Conversão realizada com sucesso!";
        
            } catch( Exception $e){
                return $e->getMessage();
            }   
        }

    }
?>