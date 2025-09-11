<?php
    class Carrinho{
       private Produto $produto;
        private array $itens = [];    
        
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
      

    }


      private function validaEstoque(int $quantidade):bool{
       
    }
    


}