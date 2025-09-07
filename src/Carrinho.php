<?php
    class Carrinho{

        private array $itens = [];    

        public function adicionarItemAoCarrinho(Produto $produto, int $quantidade):string{
            if(!$produto->reduzirEstoque($quantidade)){
                return "estoque infusciente para {$produto->getNome()}!";
            }

            foreach($this->itens as $item){
                if($item['produto']->getId()== $produto->getId()){
                    $item['quantidade'] += $quantidade;
                    return "produto {$produto->getNome()} atualizado no carrinho!";
                }
            }

            $this->itens[] = [
                'produto' => $produto,
                'quantidade' => $quantidade
            ];
            return "Produto {$produto->getNome()} adicionado ao carrinho!";
        }

        public function removerItemAoCarrinho(int $produto_id):string{
            foreach($this->itens as $index => $item){
                if($item['produto']->getId() == $produto_id) {
                    $item['produto']->aumentarEstoque($item['quantidade']);
                    unset($this->itens[$index]);
                    $this->itens = array_values($this->itens);
                    return "<p> Produto removido do carrinho! </p>";
                }
            }
            return "<p> Produto não encontrado no carrinho! </p> ";
        }

        public function listarItensDoCarrinho(string $cupom = ''): void {
            if (empty($this->itens)) {
                echo "<p> Carrinho vazio. </p>";
                return;
            }

            $total = 0;
            echo "\nItens no carrinho:\n";
            foreach ($this->itens as $item) {
                $subtotal = $item['quantidade'] * $item['produto']->getPreco();
                $total += $subtotal;
                echo " {$item['produto']->getNome()} " ;
                echo " Quantidade: {$item['quantidade']}";
                echo " Subtotal: R$ " . number_format($subtotal, 2);
            }

            if ($cupom === 'DESCONTO10') {
                $desconto = $total * 0.1;
                $total -= $desconto;
                echo " Desconto aplicado: R$ " . number_format($desconto, 2);
            }

            echo " Total: R$ " . number_format($total, 2);
        }
      

        public function calcularTotal(): float{
            $total = 0;
            foreach ($this->itens as $item) {
                $total += $item['quantidade'] * $item['produto']->getPreco();
            }
            return $total;
        }
        

        public function calcularDesconto(String $cupom){
            $total = $this->calcularTotal();
            if ($cupom == 'DESCONTO10') {
                $total *= 0.9;
            }
        return $total;
        }

    }
   
