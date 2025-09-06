<?php
    class Carrinho{
        private $item;
    
        public function __contruct($item){
            $this->item = $item;
        }

        public function validacoesDeId($id): array {
            if(empty($this->{$id})) return;
            if(is_string($this->{$id})) return;
            if(is_float($this->{$id})) return;
            if($id <= 0) return;

            $this->$id => 'id';
        }

        public function validacoesDeNome($nome): array {
            if(empty($this->{$nome})) return;
            if(is_integer($this->{$nome})) return;
            if(strlen($nome)>= 100) return;

            $this->$nome=>'nome';
        }
    }
?>