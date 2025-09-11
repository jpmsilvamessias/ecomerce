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
            if(!validaId()){
                throw new Exception("erro id nao existe");
            }

            if(!validaEstoque($quantidade)){
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
            if($this->produto->getEstoque() <= $quantidade){
                return false;
            }
                return true;
        }

        private function removerItem(int $id): void{
            //Validar se o item existe no carrinho.
            //Atualizar carrinho e devolver estoque.
        }

        private function listarItemCarrinho(): array{
            // Mostrar os itens adicionados com quantidade, subtotal e total
        }

        private function calcularTotal(): void {
            //Somar todos os subtotais.
        }

        private function aplicacaoDesconto(): void{
            //Regra simples: cupom DESCONTO10 → 10% no total.
            //O desconto deve ser aplicado no cálculo do total final.
        }
    


}
