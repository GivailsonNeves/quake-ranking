<?php 
    /**
     * Classe UploaderLog
     * 
     * Faz o upload do arquivo de log e o tratamento das possíveis exceções
     */
    class UploaderLog{

        //local onde o arquivo será salvo, com o nome do arquivo
        private $upload_path = "";
        //nome original do arquivo enviado
        private $file_name = "";
        //arquivo enviado
        private $file = null;
        //nome do file enviado no form
        private $field_name = "";
        //erro gerado no processo de upload.
        private $erro = "";

        /**
         * construtor da classe
         * field_name propriedade name do formulário de envio
         */
        public function __construct($field_name)
        {
            $this->field_name = $field_name;
            $this->file = $_FILES[$this->field_name];
            $this->file_name = $this->file['name'];
            $this->upload_path = getcwd() . "/__uploads/$this->file_name";
        }

        /**
         * Efetua o processo de upload em si
         */
        public function upload_file()
        {
            if(!$this->is_valid())            
                return null;

            return move_uploaded_file($this->file['tmp_name'], $this->upload_path);
        }

        /**
         * Retorna a url do arquivo no servidor
         */
        public function get_file_path()
        {
            return $this->upload_path;
        }

        /**
         * Devolver o erro gerado, caso não haja erro está string estará vazia
         */
        public function get_erro()
        {
            return $this->erro;
        }

        /**
         * Verifica o formato do arquivo enviado
         */
        private function is_valid()
        {
            if($this->file["type"] != "application/octet-stream"){
                $this->erro = "formato de arquivo inválido!";
                return false;
            }
            return true;
        }

    }

?>