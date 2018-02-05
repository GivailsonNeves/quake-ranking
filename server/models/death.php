<?php
    /**
     * Classe de Mortes
     */
    class Death{
        //assasino
        public $killer;
        //vítima
        public $killed;
        //tipo da morte
        public $mode;

        /**
         * construtor, inicializa a classe com os respetivos paraâmetros
         */
        public function __construct($killer, $killed, $mode)
        {
            $this->killer = $killer;
            $this->killed = $killed;
            $this->mode = $mode;
        }
    }
?>