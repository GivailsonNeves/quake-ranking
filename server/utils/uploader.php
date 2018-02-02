<?php 

    class UploaderLog{

        private $upload_path = "";
        private $file_name = "";
        private $file = null;
        private $field_name = "";
        private $erro = "";

        public function __construct($field_name)
        {
            $this->field_name = $field_name;
            $this->file = $_FILES[$this->field_name];
            $this->file_name = $this->file['name'];
            $this->upload_path = getcwd() . "/__uploads/$this->file_name";
        }

        public function upload_file()
        {
            if(!$this->is_valid())            
                return null;

            return move_uploaded_file($this->file['tmp_name'], $this->upload_path);
        }

        public function get_file_path()
        {
            return $this->upload_path;
        }

        public function get_erro()
        {
            return $this->erro;
        }

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