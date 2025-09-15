<?php
    class Carrinho{
        private Produto $produto;
        private array $itens = []; 
        private const DESCONTO10 = 0.10;
        
        public function __construct(Produto $produto, array $itens = []) 
        {
          $this->itens = $itens;
          $this->produto = $produto;
        }

        public function adcionarNoCarrinho(int $id, int $quantidade):void 
        {
            if(!$this->validaId($id)) {
                echo"Erro id nao existe.<br>";
                return;
            }

            if(!$this->validaEstoque($quantidade)) {
                echo"Quantidade maior que estoque.<br>";
                return;
            }

            $this->itens[] = [
                'idProduto'=> $id,
                'quantidade'=> $quantidade,
                'subtotal'=>$this->produto->getPreco() * $quantidade,
            ];
         
        }

        public function validaId(int $id):bool
        {
            if($this->produto->getId() != $id) {
                return false;
            }
            return true;
        }


        public function validaEstoque(int $quantidade):bool 
        {
            if($this->produto->getEstoque() < $quantidade) {
                return false;
            }
                return true;
        }

        public function removerItem(int $id): void 
        {
            foreach($this->itens as $index => $item) {
                if($item['idProduto']===$id) {
                    unset($this->itens[$index]);
                    break;
                }
            }
        }

        public function listarItemCarrinho(): array
        {
           return $this->itens;
        }

        public function calcularTotal(): float 
        {
            $total = 0;
            foreach ($this->itens as $item) {
                $total += $item['subtotal'];
            }
            return $total;
        }
        public function aplicacaoDesconto(): float 
        {
            $total = $this->calcularTotal();
            return $total - ($total * Carrinho::DESCONTO10);

        }
    


}
