<?php 
    require_once( getcwd() . "/database/database.php");

    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    class ServiceRequest {

        private $tipo_servico;
        private $db = null;
        private $result = array( "data" => null, "result" => TRUE );
        private $code_return = 200;

        public function __construct()
        {            
            $this->tipo_servico = @$_GET['type'];            
        }

        public function get_code_return()
        {
            return $this->code_return;
        }

        public function process_request()
        {
            try{                      
                if($this->check_request()){
                    
                    $this->db = new DatabaseConnect();           
                    $this->process();
                }
        
            } catch( Exception $e){
                $this->result = array( "data" => $e->getMessage(), "result" => FALSE );        
                $this->code_return = 500;
            }

            return $this->result;
            
        }

        private function check_request(){

            if(!$this->tipo_servico){
                $this->result = "Página não encontrada";        
                $this->code_return = 404;    
                return false;

            }else if( !in_array($this->tipo_servico, array('ranking', 'relatorio')) ){
                $this->result = "Erro na solicitação";        
                $this->code_return = 400;    
                return false;
            }                

            return true;
        }

        private function process()
        {
            switch ($this->tipo_servico) {
                case 'ranking':
                        $this->result = array( "data" => $this->db->list_ranking(), "result" => FALSE );
                    break;
                
                case 'relatorio':
                        $this->result = array( "data" => $this->db->list_deaths(), "result" => FALSE );
                    break;
            }
        }

    }
    

    $service = new ServiceRequest();    

    echo json_encode($service->process_request());
    http_response_code($service->get_code_return());
?>