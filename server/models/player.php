<?php 

    class Player{
        public $nome;
        public $total_mortes;

        public function __construct($nome)
        {
            $this->nome = $nome;
            $this->total_mortes = 0;
        }

        public function decrement_mortes()
        {
            $this->total_mortes--;
        }

        public function increment_mortes()
        {
            $this->total_mortes++;
        }
    }
?>