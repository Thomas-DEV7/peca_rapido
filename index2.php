<?php

// include './components/conn.php';

// require './components/header.php';

// session_start();
try {
    if ($_SESSION['nivel'] == 'admin') {
        $id_user = $_SESSION['id'];
        $sql = "SELECT * FROM produtos WHERE created_by= $id_user";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if ($_SESSION['nivel'] == 'cliente') {
        $id_user = $_SESSION['id'];
        $sql = "SELECT * FROM produtos ORDER BY nome_produto DESC";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Erro ao recuperar produtos: " . $e->getMessage();
}

// Fechar a conexão
$pdo = null;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Listagem de Produtos</title>
    <!-- Inclua os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Produtos</h2>
        <div class="row">
            <?php foreach ($result as $row): ?>

                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm" >
                        <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="Imagem do Produto" style="width: 100%; height: 100%;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title"><?php echo $row['nome_produto']; ?></h5>
                                <p class="list-group-item">R$ <?php echo number_format($row['valor'], 2, ',', '.'); ?></p>
                            </div>
                            <div class="d-flex">
                                <p class="card-text" style="font-size: 14px; color: #333;"><?php echo $row['descricao']; ?></p>
                                <!-- <p class="list-group-item"><strong>Estoque:</strong> <?php echo $row['quantidade_estoque']; ?></p> -->
                            </div>


                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- <li class="list-group-item"><strong>Valor:</strong> R$ <?php echo number_format($row['valor'], 2, ',', '.'); ?></li> -->

                        </ul>
                        <div class="d-flex justify-content-between p-3">
                            <div>
                                <!-- <a href="#" class="btn btn-primary">Detalhes</a> -->
                                <?php if ($row['quantidade_estoque'] > 0 && $_SESSION['nivel'] != 'admin'): ?>
                                    <button class="btn btn-primary align-items-center add-to-cart" data-product-id="<?php echo $row['id']; ?>" data-product-name="<?php echo $row['nome_produto']; ?>" data-product-price="<?php echo $row['valor']; ?>">
                                        <span class="mr-2">Adicionar ao Carrinho</span>
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                <?php endif;?>

                                <?php if ($row['quantidade_estoque'] <= 0 && $_SESSION['nivel'] != 'admin'): ?>
                                    <a href="#" class="btn btn-primary align-items-center disabled">Indisponivel</a>
                                <?php endif;?>
                            </div>
                            <div>
                                <?php if ($_SESSION['nivel'] == 'admin'): ?>
                                    <a href="./editar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning p-2 mx-2 fas fa-edit"></a>
                                    <a href="./excluir.php?id=<?php echo $row['id']; ?>" class="btn btn-danger p-2 fas fa-trash-alt"></a>
                                <?php endif;?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Adicione um evento de clique aos botões "Adicionar ao Carrinho"
                document.querySelectorAll('.add-to-cart').forEach(function(button) {
                    button.addEventListener('click', function() {
                        var productId = button.getAttribute('data-product-id');
                        var productName = button.getAttribute('data-product-name');
                        var productPrice = button.getAttribute('data-product-price');

                        // Suponhamos que você tenha informações do produto disponíveis em JavaScript
                        var product = {
                            id: productId,
                            nome: productName,
                            preco: productPrice
                            // Adicione mais informações do produto, se necessário
                        };

                        // Verifique se o localStorage é suportado pelo navegador
                        if (typeof(Storage) !== 'undefined') {
                            // Recupere o carrinho atual do localStorage (se existir)
                            var carrinhoAtual = JSON.parse(localStorage.getItem('carrinho')) || [];

                            // Adicione o novo produto ao carrinho
                            carrinhoAtual.push(product);

                            // Salve o carrinho atualizado no localStorage
                            localStorage.setItem('carrinho', JSON.stringify(carrinhoAtual));

                            // alert('Produto adicionado ao carrinho!');
                        } else {
                            alert('Desculpe, o seu navegador não suporta localStorage.');
                        }
                    });
                });
            });
        </script>






    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>