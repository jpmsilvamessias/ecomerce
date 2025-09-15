<?php
require_once 'src/Produto.php';
require_once 'src/Carrinho.php';


$produtos = [
    1 => new Produto(1, 'Camiseta', 59.90, 10),
    2 => new Produto(2, 'Calça Jeans', 129.90, 5),
    3 => new Produto(3, 'Tênis', 199.90, 3)
];

function exibirCarrinho(Carrinho $carrinho) {
    $itens = $carrinho->listarItemCarrinho();
    if (empty($itens)) {
        echo "Carrinho vazio!<br>";
        return;
    } else {
        foreach ($itens as $item) {
        echo "Produto: {$item['idProduto']} | Quantidade: {$item['quantidade']} | Subtotal: R$ {$item['subtotal']}<br>";
        }
         echo "<br>";
    }
}


echo "=== Caso 1: Adicionar produto válido ===<br>";
$carrinho = new Carrinho($produtos[1]);
$carrinho->adcionarNoCarrinho(1, 2);
exibirCarrinho($carrinho);

echo "=== Caso 2: Usuário tenta adicionar além do estoque ===<br>";
$carrinho = new Carrinho($produtos[3]);
$carrinho->adcionarNoCarrinho(3, 10);
exibirCarrinho($carrinho);

echo "=== Caso 3: Usuário remove produto do carrinho ===<br>";
$carrinho = new Carrinho($produtos[2]);
$carrinho->adcionarNoCarrinho(2, 3);
$carrinho->removerItem(2);
exibirCarrinho($carrinho);

echo "=== Caso 4: Aplicação de cupom de desconto ===<br>";
$carrinho = new Carrinho($produtos[2]);
$carrinho->adcionarNoCarrinho(2, 3);
$totalComDesconto = $carrinho->aplicacaoDesconto();
exibirCarrinho($carrinho);
echo "Total atualizado: R$ " . number_format($totalComDesconto, 2, ',', '.') . "<br>";







