<?php
    require_once 'logica/session_validate.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sobre o site</title>
    <link rel="icon" type="img/png" href="imagens/logo_icon.png">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
        integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"
        integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J"
        crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fa019dc073.js" crossorigin="anonymous"></script>

    <!-- Estilo e script -->
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

</head>

<body>
    <header>
        <div class="container">

            <nav class="navbar navbar-expand-lg nav-side-menu">

                <div class="brand">
                    <a href="criar.php"><img src="imagens/brand.png" alt="brand" width="220"></a>
                </div>

                <button id="bars" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="pl-2 nav-item">
                            <a href="criar.php" class="nav-link primeiro"> <i class="fas fa-edit"></i> &nbsp; Criar Projeto </a>
                        </li>

                        <li class="nav-item">
                            <a href="consultar.php" class="nav-link"> <i class="fas fa-search"></i> &nbsp; Consultar Projeto </a>
                        </li>

                        <li class="nav-item">
                            <a href="info.php" class="nav-link ativo"> &nbsp; <i class="fas fa-info"></i> &nbsp; Sobre o site </a>
                        </li>

                        <li class="nav-item">
                            <a href="logica/session_destroy.php" class="nav-link logoff"> &nbsp; <i class="fas fa-sign-out-alt"></i> &nbsp; Deslogar </a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </header>

    <section class="container">

        <div class="jumbotron">
            <h1 class="display-4">Organizador de projetos</h1>
            <p class="lead">Crie e organize todas as informações de seu projeto de modo muito prático e objetivo. Volte no site sempre que precisar consultar informações do projeto ou atualiza-las</p>
            <hr class="my-4">
            <p>Para começar, na página principal, preencha os campos de formulário referentes às informações de seu projeto. Alguns campos poder ser deixados em branco. Em outros campos podem ser adicionado mais grupos de formulários clicando no botão <button type="button" class="btn btn-success btn-sm"> <i class="fas fa-plus" style="font-size: 14px"></i> </button></p>
            <a class="btn btn-primary btn-lg" href="criar.php" role="button">Vamos começar!!!</a>
        </div>

    </section>
</body>

</html>