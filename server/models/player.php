<?php 

    /**
     * Classe de modelo dos jogadores
     */
    class Player{
        //nome do jogador
        public $nome;
        //total de mortes
        public $total_mortes;

        /**
         * Inicializa a classe Player
         */
        public function __construct($nome, $total_mortes = 0)
        {
            $this->nome = $nome;
            $this->total_mortes = $total_mortes;
        }

        /**
         * remove um ponto do contador de mortes do jogado
         */
        public function decrement_mortes()
        {
            $this->total_mortes--;
        }
        
        /**
         * adiciona um ponto ao contador de mortes do jogador
         */
        public function increment_mortes()
        {
            $this->total_mortes++;
        }
    }
?>