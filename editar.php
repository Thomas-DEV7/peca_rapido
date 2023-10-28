<?php

require_once './components/conn.php';

$produto = []; // Inicializa a variável $produto como um array vazio

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        // Dados do formulário
        $id = $_POST['id'];
        $nome_produto = $_POST['nome_produto'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $quantidade_estoque = $_POST['quantidade_estoque'];

        $sql = "UPDATE produtos
           SET nome_produto = :nome_produto, descricao = :descricao, valor = :valor, img = :img, quantidade_estoque = :quantidade_estoque
           WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome_produto', $nome_produto);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':quantidade_estoque', $quantidade_estoque);
        $stmt->execute();

        header('Location: ./listagem.php');
        exit;
    } catch (PDOException $e) {
        // Trate qualquer exceção que ocorra aqui
    }
}

try {

    // Verifique se o parâmetro "id" foi passado na URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta SQL para buscar os dados do produto com base no ID
        $consulta = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        // Preencha a variável $produto com os dados do produto
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "ID não encontrado na URL.";
        exit; // Encerre o script se não houver ID na URL.
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Atualizar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">
</head>

<body class="container">
    <div class="card card-body shadow-lg mt-4">
        <h2 class="mt-4">Atualizar Produto</h2>
        <form method="POST" action="" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

            <div class="form-group">
                <label for="nome_produto">Nome do Produto:</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao"><?php echo $produto['descricao']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $produto['valor']; ?>">
            </div>

            <div class="form-group">
                <label for="img">Imagem:</label>
                <input type="text" class="form-control" id="img" name="img" value="<?php echo $produto['img']; ?>">
            </div>

            <div class="form-group">
                <label for="quantidade_estoque">Quantidade em Estoque:</label>
                <input type="text" class="form-control" id="quantidade_estoque" name="quantidade_estoque" value="<?php echo $produto['quantidade_estoque']; ?>">
            </div>

            <button type="submit" class="btn btn-primary pt-2 pb-0 mt-2 ">Atualizar <p class="ml-2 fas fa-save"></p></button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>