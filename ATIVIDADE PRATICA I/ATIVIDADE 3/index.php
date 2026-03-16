<?php

function criarCardapio(){
    return [
        1 => ["produto" => "X-Burguer", "preco" => 18.00],
        2 => ["produto" => "X-Salada", "preco" => 20.00],
        3 => ["produto" => "Batata Frita", "preco" => 15.00],
        4 => ["produto" => "Refrigerante", "preco" => 8.00],
        5 => ["produto" => "Suco Natural", "preco" => 10.00]
    ];
}

function mostrarCardapio($cardapio){
    echo "\n=== CARDÁPIO ===\n";

    foreach($cardapio as $codigo => $item){
        echo "$codigo - ".$item["produto"]." - R$ ".$item["preco"]."\n";
    }
}

function escolherProduto($cardapio){

    do{
        $codigo = readline("Digite o código do produto: ");

        if(!isset($cardapio[$codigo])){
            echo "Código inválido!\n";
        }

    }while(!isset($cardapio[$codigo]));

    return $codigo;
}

function quantidadeProduto(){

    do{
        $quantidade = readline("Digite a quantidade: ");

        if($quantidade <= 0){
            echo "Quantidade inválida!\n";
        }

    }while($quantidade <= 0);

    return $quantidade;
}

function valorPago($total){

    do{
        $valorPago = readline("Digite o valor pago: ");

        if($valorPago < $total){
            echo "Valor insuficiente!\n";
        }

    }while($valorPago < $total);

    return $valorPago;
}

function mostrarResumo($cliente,$pedidos,$total,$valorPago,$troco){

    echo "\n=== RESUMO DO PEDIDO ===\n";
    echo "Cliente: $cliente\n\n";

    echo "Itens pedidos:\n";

    foreach($pedidos as $pedido){
        echo $pedido["quantidade"]."x ".$pedido["produto"]."\n";
    }

    echo "\nTotal da compra: R$ $total\n";
    echo "Valor pago: R$ $valorPago\n";
    echo "Troco: R$ $troco\n";
}


$cardapio = criarCardapio();

$cliente = readline("Digite o nome do cliente: ");

$pedidos = [];

$totalGeral = 0;

do{

    mostrarCardapio($cardapio);

    $codigo = escolherProduto($cardapio);

    $quantidade = quantidadeProduto();

    $produto = $cardapio[$codigo]["produto"];
    $preco = $cardapio[$codigo]["preco"];

    $totalItem = $preco * $quantidade;

    $totalGeral += $totalItem;

    $pedidos[] = [
        "produto" => $produto,
        "quantidade" => $quantidade
    ];

    echo "Item adicionado!\n";

    $continuar = readline("Deseja adicionar mais um pedido? (s/n): ");

}while($continuar == "s");

echo "\nTotal da compra: R$ $totalGeral\n";

$valorPago = valorPago($totalGeral);

$troco = $valorPago - $totalGeral;

mostrarResumo($cliente,$pedidos,$totalGeral,$valorPago,$troco);

?>