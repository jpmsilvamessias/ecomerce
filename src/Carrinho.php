<?php
    class Carrinho{
        private Produto $produto;
        private array $itens = []; 
        private const DESCONTO10 = 0.10;
        
        public function __construct(array $itens = [],Produto $produto){
          $this->itens = $itens;
          $this->produto = $produto;
        }

        public function adcionarnoCarrinho(int $id,int $quantidade):void {
            if($this->validaId($id)){
                throw new Exception("erro id nao existe");
            }

            if($this->validaEstoque($quantidade)){
                throw new Exception("quantidade maior que estoque");
            }

            $this->itens[]=[
                'idProduto'=> $id,
                'quantidade'=> $quantidade,
                'subtotal'=>$this->produto->getPreco()*$quantidade,
            ];
         
        }

        private function validaId(int $id):bool{
            if($this->produto->getId() != $id){
                return false;
            }
            return true;
        }


        private function validaEstoque(int $quantidade):bool{
            if($this->produto->getEstoque() < $quantidade){
                return false;
            }
                return true;
        }

        private function removerItem(int $id): void{
            foreach($this->itens as $itens){
                if($itens['idproduto']===$id){
                    unset($this->itens[$itens]);
                    break;
                }
            }
        }

        private function listarItemCarrinho(): array{
           return $this->itens;
        }

        private function calcularTotal(): void {
            $total = 0;
            foreach ($this->itens as $item) {
                $total += $item['subtotal'];
            }
            return $total;
    }
        private function aplicacaoDesconto(): void{
           
        }
    


}
