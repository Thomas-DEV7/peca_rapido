<?php

require_once '../components/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf_cnpj = $_POST["cpf_cnpj"];
        $nivel = 'cliente';

        // Query SQL para inserir um novo produto
        $sql = "INSERT INTO usuarios (nome, telefone, email, senha, cpf_cnpj, nivel_acesso)
                VALUES (:nome, :telefone, :email, :senha, :cpf_cnpj, :nivel_acesso)";


        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome); //aponta a variavel temporaria, para a variavel que contem o valor que sera enviado.
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam(':nivel_acesso', $nivel);
        $stmt->execute(); // executa a transação

        echo "User inserido com sucesso!"; // se der certo aparecerá isso
    } catch (PDOException $e) {
        echo "Erro ao inserir o produto: " . $e->getMessage();
    }


    $pdo = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <!-- Inclua o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Registro de Usuário</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                        <div class="invalid-feedback">
                            Por favor, insira seu nome.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Por favor, insira um endereço de email válido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>

                    <div class="mb-3">
                        <label for="cpf_cnpj" class="form-label">CPF ou CNPJ:</label>
                        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" required>
                    </div>

                    <!-- <div class="mb-3">
                            <label for="cep" class="form-label">CEP:</label>
                            <input type="text" class="form-control" id="cep" name="cep">
                        </div>

                        <div class="mb-3">
                            <label for="logradouro" class="form-label">Logradouro:</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro">
                        </div>

                        <div class="mb-3">
                            <label for="bairro" class="form-label">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro">
                        </div>

                        <div class="mb-3">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade">
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado">
                        </div>

                        <div class="mb-3">
                            <label for="numero_casa" class="form-label">Número da Casa:</label>
                            <input type="text" class="form-control" id="numero_casa" name="numero_casa">
                        </div>

                        <div class="mb-3">
                            <label for="url_img" class="form-label">URL da Imagem:</label>
                            <input type="text" class="form-control" id="url_img" name="url_img">
                        </div>

                        <div class="mb-3">
                            <label for="nome_usuario" class="form-label">Nome de Usuário:</label>
                            <input type="text" class="form-control" id="nome_usuario" name="nome_usuario">
                            <div class="invalid-feedback">
                                Este nome de usuário já está em uso.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="senha_cartao" class="form-label">Senha do Cartão:</label>
                            <input type="password" class="form-control" id="senha_cartao" name="senha_cartao">
                        </div>

                        <div class="mb-3">
                            <label for="numero_cartao" class="form-label">Número do Cartão:</label>
                            <input type="text" class="form-control" id="numero_cartao" name="numero_cartao">
                        </div>

                        <div class="mb-3">
                            <label for="cvv_cartao" class="form-label">CVV do Cartão:</label>
                            <input type="text" class="form-control" id="cvv_cartao" name="cvv_cartao">
                        </div>

                        <div class="mb-3">
                            <label for="nome_titular_cartao" class="form-label">Nome do Titular do Cartão:</label>
                            <input type="text" class="form-control" id="nome_titular_cartao" name="nome_titular_cartao">
                        </div>

                        <div class="mb-3">
                            <label for="validade_cartao" class="form-label">Validade do Cartão:</label>
                            <input type="text" class="form-control" id="validade_cartao" name="validade_cartao">
                        </div>

                        <div class="mb-3">
                            <label for="dados_cartao" class="form-label">Dados do Cartão:</label>
                            <textarea class="form-control" id="dados_cartao" name="dados_cartao"></textarea>
                        </div> -->

                    <!-- <div class="mb-3">
                        <label for="nivel_acesso" class="form-label">Nível de Acesso:</label>
                        <select class="form-select" id="nivel_acesso" name="nivel_acesso">
                            <option value="membro">Membro</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div> -->

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclua o JS do Bootstrap (opcional, se necessário) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>