<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Faça login para continuar</title>
    <link rel="icon" type="img/png" href="imagens/logo_icon.png">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>

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

<div id="pagina">

    <section id="login-container" class="container">
        <div id="login-header" class="row">
            <img src="imagens/logo_icon.png" alt="ícone de lâmpada" class="col-sm-3 img-fluid d-none d-sm-block">
            <div class="col-sm-9 row d-flex">
                <h2 class="d-inline text-center text-primary align-self-center col-12"> Bem vindo </h2>
                <h5 class="d-inline text-center text-secondary col-12"> Cria uma conta rapidamente </h5>
            </div>
        </div>

        <hr>

        <div id="login-body">
            <form action="logica/dados_criar_instancias.php?acao=cadastrar" method="POST" id="cadastro_form">

                <label for="novo_email">Email: </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-user-plus"></i> </span>
                    </div>
                    <input type="email" class="form-control" id="novo_email" name="novo_email" required maxlength="50" placeholder="ex.: usuario@gmail.com">
                    <div class="invalid-feedback">Preencha esse campo ou bote um email válido</div>
                </div>

                <br>

                <label for="nova_senha">Senha: </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-key"></i> </span>
                    </div>
                    <input type="password" class="form-control" id="nova_senha" name="nova_senha" required maxlength="50" placeholder="">
                    <div class="invalid-feedback">Preencha esse campo</div>
                </div>

                <br>

                <label for="confirma_senha">Confirme a senha: </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-key"></i> </span>
                    </div>
                    <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required placeholder="">
                    <div class="invalid-feedback">As senhas não batem</div>
                </div>

                <hr>

                <span class="text-danger" id="cadatro_erro"></span>
                <button type="button" class="btn btn-info btn-block mb-2" id="confirma_cadastro" onclick="confirmaCadastro()"> Cadastrar </button>
            </form>

            <a href="index.php" class="text-secondary" style="font-size: small">Voltar para a página de login </a>

        </div>
    </section>

</div>

</body>

</html>