<?php 
    require_once( getcwd() . "/database/database.php");

    /**
     * Classe que gerencia as chamadas de serviços, gerencia todas as chamadas de serviço
     */
    class ServiceRequest {

        //tipo de serviço solicitado
        private $tipo_servico;
        //referencia da classe de gestaão de banco de dados
        private $db = null;
        //array para feedback de retorno
        private $result = array( "data" => null, "result" => TRUE );
        //código padrão de retorno http
        private $code_return = 200;

        /**
         * Construtor da classe
         * 
         * capturar por ver GET a propriedade type que representa o serviço a ser tratado.
         */
        public function __construct()
        {            
            $this->tipo_servico = @$_GET['type'];            
        }

        /**
         * retorna o código http referente ao resultado da operação, Ex: 200, 400, 401, 500 etc...
         */
        public function get_code_return()
        {
            return $this->code_return;
        }

        /**
         * processa a requisição solicitada e devolve o retorno do serviço conforme a solicitação
         */
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

        /**
         * responsável por validar se o formato da chamada está adequado aos serviços oferecidos.
         */
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

        /**
         * responsável por realizar a execução conforme o serviço chamado.
         */
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

?>