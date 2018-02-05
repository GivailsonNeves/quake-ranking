<?php
    class Death{
        public $killer;
        public $killed;
        public $mode;

        public function __construct($killer, $killed, $mode)
        {
            $this->killer = $killer;
            $this->killed = $killed;
            $this->mode = $mode;
        }
    }
?>