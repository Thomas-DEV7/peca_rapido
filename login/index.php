<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card card-body">
            <h1 class="text-center">Login de Usuário</h1>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <!-- Inclua o JS do Bootstrap (opcional, se necessário) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php
require_once '../components/conn.php';
session_start();

// Verificar se o usuário já está logado e redirecioná-lo para o painel se estiver logado
if (isset($_SESSION["nome"])) {
    header('Location: ../dashboard');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário aqui
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        // Preparar a instrução SQL para verificar as credenciais do usuário
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION["nome"] = $result["nome"];
            $_SESSION["id"] = $result["id"];
            $_SESSION["nivel"] = $result["nivel_acesso"];
            $_SESSION["foto"] = $result["url_img"];
            header('Location: ../dashboard'); // Redirecionar para o painel após o login
            exit;
        } else {
            // As credenciais estão incorretas
            $_SESSION['message_session'] = "Credenciais incorretas. Por favor, tente novamente.";
            header('Location: ./index.php'); // Redirecionar de volta para a página de login
            exit;
        }
    } catch (PDOException $e) {
        // Tratar erros de conexão ou consulta
        $_SESSION['message_session'] = "Erro: " . $e->getMessage();
        header('Location: ./index.php'); // Redirecionar de volta para a página de login
        exit;
    }
}
if (isset($_SESSION['message_session'])) {
    echo "<div class='container mt-3'>";
    echo "<div class='alert alert-danger'>Erro: " . $_SESSION['message_session'] . "</div>";
    echo "</div>";
    unset($_SESSION['message_session']); // Remove a mensagem da sessão
}
?>

<!-- Seu formulário de login HTML aqui -->