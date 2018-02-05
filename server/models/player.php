<?php 

    class Player{
        public $nome;
        public $total_mortes;

        public function __construct($nome, $total_mortes = 0)
        {
            $this->nome = $nome;
            $this->total_mortes = $total_mortes;
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