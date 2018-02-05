<?php
    require_once( getcwd() . '/models/player.php');
    require_once( getcwd() . '/models/death.php');
    
    /**
     * Classe de modelo dos jogos
     */
    class Game{
        //nome do jogo
        public $nome;
        //vetor de jogadores
        public $jogadores;
        //total de mortes na partida
        public $total_mortes;
        //lista detalhada de mortes
        public $mortes;

        /**
         * inicializa a classe Game
         */
        public function __construct($nome, $total_mortes = 0)
        {
            $this->nome = $nome;
            $this->jogadores = array();
            $this->mortes = array();
            $this->total_mortes = $total_mortes;
        }        

        /**
         * Incrementa o contador de mortes e delega as penalizações ou pontuações aos usuários
         */
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

        /**
         * Localiza o jogador no vetor e devolve sua possição, caso o jogador não exista, nesse momento ele é criado.
         */
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