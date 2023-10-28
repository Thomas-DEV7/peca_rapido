<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>



<body>
    <h1>Seu Carrinho de Compras</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id="carrinho-body">
            <!-- Conteúdo da tabela será gerado dinamicamente aqui -->
        </tbody>
    </table>

    <div id="preco-final">
        <h2>Preço Total: R$ <span id="total"></span></h2>
    </div>

    <script>
        // Recupere os dados do localStorage
        var carrinhoAtual = JSON.parse(localStorage.getItem('carrinho')) || [];

        // Obtém o elemento tbody da tabela onde os produtos serão exibidos
        var carrinhoBody = document.getElementById('carrinho-body');

        // Obtém o elemento onde o preço total será exibido
        var totalElement = document.getElementById('total');

        // Inicializa o preço total como zero
        var precoTotal = 0;

        // Itera pelos dados do carrinho e cria as linhas da tabela dinamicamente
        carrinhoAtual.forEach(function(produto) {
            var newRow = carrinhoBody.insertRow();
            var idCell = newRow.insertCell(0);
            var nomeCell = newRow.insertCell(1);
            var precoCell = newRow.insertCell(2);

            idCell.innerHTML = produto.id;
            nomeCell.innerHTML = produto.nome;
            precoCell.innerHTML = "R$ " + produto.preco;

            // Adiciona o preço do produto ao preço total
            precoTotal += parseFloat(produto.preco);
        });

        // Exibe o preço total na página
        totalElement.textContent = precoTotal.toFixed(2);
    </script>
</body>

</html>