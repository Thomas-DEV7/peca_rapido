
<?php

require_once './components/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $nome_produto = $_POST['nome_produto']; //São resgatados da classe  name do input.
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $quantidade_estoque = $_POST['quantidade_estoque'];
        $created_by = $_SESSION['id'];

        // Query SQL para inserir um novo produto
        $sql = "INSERT INTO produtos (nome_produto, descricao, valor, img, quantidade_estoque, created_by)
                VALUES (:nome_produto, :descricao, :valor, :img, :quantidade_estoque, :created_by)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_produto', $nome_produto); //aponta a variavel temporaria, para a variavel que contem o valor que sera enviado.
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':quantidade_estoque', $quantidade_estoque);
        $stmt->bindParam(':created_by', $created_by);
        $stmt->execute(); // executa a transação

        echo "Produto inserido com sucesso!"; // se der certo aparecerá isso
    } catch (PDOException $e) {
        echo "Erro ao inserir o produto: " . $e->getMessage();
    }

    // Fechar a conexão
    $pdo = null;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inserir Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Inserir Produto</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nome_produto" class="form-label">Nome do Produto:</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" id="valor" name="valor">
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Imagem:</label>
                <input type="text" class="form-control" id="img" name="img">
            </div>
            <div class="mb-3">
                <label for="quantidade_estoque" class="form-label">Quantidade em Estoque:</label>
                <input type="text" class="form-control" id="quantidade_estoque" name="quantidade_estoque">
            </div>
            <button type="submit" class="btn btn-primary">Inserir</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>