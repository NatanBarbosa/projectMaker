<?php
    require_once 'logica/session_validate.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Crie seu projeto</title>
    <link rel="icon" type="img/png" href="imagens/logo_icon.png">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
        integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
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
                            <a href="criar.php" class="nav-link ativo primeiro"> <i class="fas fa-edit"></i> &nbsp; Criar Projeto </a>
                        </li> 

                        <li class="nav-item">
                            <a href="consultar.php" class="nav-link"> <i class="fas fa-search"></i> &nbsp; Consultar Projeto </a>
                        </li> 

                        <li class="nav-item">
                            <a href="info.php" class="nav-link"> &nbsp; <i class="fas fa-info"></i> &nbsp; Sobre o site </a>
                        </li>

                        <li class="nav-item">
                            <a href="logica/session_destroy.php" class="nav-link logoff"> &nbsp; <i class="fas fa-sign-out-alt"></i> &nbsp; Deslogar </a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </header>

    <section class="container py-3 mb-3">

        <!-- Mensagem de criação bem sucedida -->
        <? if( isset( $_GET['criar'] ) && $_GET['criar'] == 'sucesso' ) {?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
                <strong>Sucesso!</strong> Seu projeto foi criado!
            </div>
        <? } ?>

        <h1>Informe os dados do projeto</h1>
        <hr>

        <form method="POST" action="logica/dados_armazenar.php" id="criarProjeto">
            <fieldset>
                <legend>Informações gerais</legend>

                <div class="form-group">
                    <label for="nome">Nome/identificação do projeto</label> <br>
                    <input type="text" id="nome" name="nome" class="form-control max-length" placeholder="Ex.: Desenvolvimento de sistema WEB" maxlength="50">
                    <div class="invalid-feedback"> Preencha este campo ou diminua a quantidade de caracteres (max: 50) </div>
                </div> <br>

                <div class="form-group">
                    <label for="dataInicio">Data de início</label> <br>
                    <input type="date" id="dataInicio" name="dataInicio" class="form-control">
                    <div class="invalid-feedback"> preencha o campo de data </div>
                </div> <br>

                <div class="form-group">
                    <label for="dataFim">Prazo final</label> <br>
                    <input type="date" id="dataFim" name="dataFim" class="form-control">
                    <div class="invalid-feedback"> A data final não deve ser menor que a inicial </div>
                </div> <br>

                <div class="form-group">
                    <label for="descricao">Descrição/detalhes</label> <br>
                    <textarea id="descricao" name="descricao" class="form-control" placeholder="insira uma descrição detalhada do projeto aqui"></textarea>
                    <div class="invalid-feedback"> Descreva seu projeto </div>
                </div> <br>
            </fieldset>

            <hr>

            <fieldset id="materiais">
                <legend>Materiais necessários</legend>

                <!-- Campos inseridos dinamicamente ao apertar o botão -->

                <button type="button" id="addMaterial" class="btn btn-success mt-2"> <i class="fas fa-plus"></i> </button>
            </fieldset>

            <hr>

            <fieldset id="funcionarios" class="mb-3">
                <legend>Mão de obra</legend>

                <!-- Campos inseridos dinamicamente ao apertar o botão -->

                <button type="button" id="addFuncionario" class="btn btn-success mt-2"> <i class="fas fa-plus"></i> </button>
            </fieldset>
            <span class="text-danger" id="aviso"></span>
            <button type="button" class="btn btn-outline-info btn-block p-2" id="btn-validar" onclick="validaFormulario()"> Guardar projeto </button>
        </form>

    </section>

</body>

</html>