<!DOCTYPE html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">

</head>

<body>

    <!-- Barra de navegação Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1">
        <div class="container">
            <div class="d-flex justify-content-between">
                <a class="navbar-brand" href="#"><img src="https://upload.wikimedia.org/wikipedia/pt/thumb/4/43/FCBarcelona.svg/2020px-FCBarcelona.svg.png" alt="" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="#">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Carrinho</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <?php if ($_SESSION["nome"]) : ?>
                    <img src="<?php echo $_SESSION['foto'] ?>" class="rounded-circle ml-2" height="40" alt="">
                    <div class="mx-2"></div>
                    <p class="nav-item text-white mt-3">
                        <a class="nav-link " href="./login/index.php">Olá, <?php echo $_SESSION["nome"]; ?>!</a>
                    </p>
                    <div class="mx-2"></div>
                    <a href="/pecarapido/components/logout.php" class=" text-white">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>

                <?php endif; ?>

                <?php if ($_SESSION["nome"] == null) : ?>
                    <p class="nav-item text-white mt-3">
                        <a class="nav-link " href="./login/index.php">Entrar</a>
                    </p>
                <?php endif; ?>

            </div>




        </div>
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>