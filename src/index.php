<?php
require_once 'Produto.php';
require_once 'Carrinho.php';




<?php
require_once 'Produto.php';
require_once 'Carrinho.php';

// Criando produtos
$produtos = [
    new Produto(1, 'Camiseta', 59.90, 10),
    new Produto(2, 'Calça Jeans', 129.90, 5),
    new Produto(3, 'Tênis', 199.90, 3),
];


$carrinho = new Carrinho();

echo "<p><strong>=== Caso 1: Usuário adiciona um produto válido ===</p></strong>";
echo $carrinho->adicionarItemAoCarrinho($produtos[0], 2);
$carrinho->listarItensDoCarrinho();


echo "<p><strong>=== Caso 2: Usuário tenta adicionar além do estoque ===</p></strong>";
echo $carrinho->adicionarItemAoCarrinho($produtos[2], 10);


echo "<p><strong>=== Caso 3: Usuário remove produto do carrinho ===</p></strong>";
echo $carrinho->removerItemAoCarrinho(1);
$carrinho->listarItensDoCarrinho();


echo "<p><strong>=== Caso 4: Aplicação de cupom de desconto ===</p></strong>";
echo $carrinho->adicionarItemAoCarrinho($produtos[1], 2);
$carrinho->listarItensDoCarrinho('DESCONTO10');

