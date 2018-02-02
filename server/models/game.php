<?php
    class Game{
        private $nome;
        private $jogadores;
        private $total_mortes;

        public function __construct($nome)
        {
            $this->nome = $nome;
            $this->jogadores = array();
            $this->total_mortes = 0;
        }

        public function increment_mortes($killer, $killed, $mode)
        {            
            if($killer == '<wolrd>'){
                $this->jogadores[$this->indexOfJogador($killed)]->decrement_mortes();
            }else{
                $this->jogadores[$this->indexOfJogador($killer)]->increment_mortes();
            }

            $this->total_mortes++;
        }

        private function indexOfJogador($nome)
        {
            for($i = 0; $i < sizeof($this->jogadores); $i++)
            {
                if($this->jogadores[$i]->nome == $nome){
                    return $i;                    
                }
            }
            array_push($this->jogadores, new Player($nome));
            return sizeof($this->jogadores) - 1;
        }
    }
?>