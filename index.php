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
                    <h5 class="d-inline text-center text-secondary col-12"> Faça login para continuar </h5>
                </div>
            </div>

            <hr>

            <div id="login-body">
                <form action="logica/session_create.php" method="POST">

                    <label for="email">Email: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-user"></i> </span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ex.: usuario@gmail.com">
                    </div>

                    <br>

                    <label for="senha">Senha: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-key"></i> </span>
                        </div>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="">
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                </form>

            </div>
        </section>

    </div>

</body>

</html>