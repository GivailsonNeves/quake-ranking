<?php
    require_once( getcwd() . '/models/player.php');
    require_once( getcwd() . '/models/death.php');
    
    class Game{
        public $nome;
        public $jogadores;
        public $total_mortes;
        public $mortes;

        public function __construct($nome, $total_mortes = 0)
        {
            $this->nome = $nome;
            $this->jogadores = array();
            $this->mortes = array();
            $this->total_mortes = $total_mortes;
        }        

        public function increment_mortes($killer, $killed, $mode)
        {            
            array_push( $this->mortes, new Death($killer, $killed, $mode) );

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