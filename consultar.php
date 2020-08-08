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
                        <a href="criar.php" class="nav-link primeiro"> <i class="fas fa-edit"></i> &nbsp; Criar Projeto </a>
                    </li>

                    <li class="nav-item">
                        <a href="consultar.php" class="nav-link ativo"> <i class="fas fa-search"></i> &nbsp; Consultar Projeto </a>
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

<section class="container py-3 mb-3" id="pagina-consulta">

    <h1>Consulte seus projetos</h1>
    <hr>

    <div id="projeto-1" class="border border-secondary p-3 mb-3 text-center">
        <h2 class="titulo-projeto"> Manutenção do site da prefeitura </h2>

        <div class="table-responsive d-none" id="tabela-1">
            <table class="table table-striped table-hover">

                <!-- Detalhes gerais -->
                <thead>
                    <tr>
                        <th colspan="2" class="text-center table-primary h5">Detalhes gerais</th>
                    </tr>
                </thead>

                <tbody>
                <tr>
                    <th> Custo total: </th>
                    <td> R$ 5700.20 </td>
                </tr>

                <tr>
                    <th> Colaboradores: </th>
                    <td> 10 </td>
                </tr>

                <tr>
                    <th> Data de início </th>
                    <td> 31/08/2020 </td>
                </tr>

                <tr>
                    <th> Prazo final </th>
                    <td> 31/09/2020 </td>
                </tr>

                <tr>
                    <th> Tempo de conclusão </th>
                    <td> 30 dias </td>
                </tr>

                <tr>
                    <th> Detalhes </th>
                    <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet illo impedit inventore nemo nesciunt officiis sed. Aspernatur ducimus exercitationem fuga inventore necessitatibus odio odit perferendis reprehenderit veniam vitae. Tenetur! </td>
                </tr>
                </tbody>

                <!-- Materiais -->
                <thead>
                    <tr>
                        <th colspan="2" class="text-center table-secondary h5">Materiais</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th> IDE Visual Studio </th>
                        <td> R$ 200,00 </td>
                    </tr>

                    <tr>
                        <th> Direitos de imagem </th>
                        <td> R$ 300,00 </td>
                    </tr>

                    <tr>
                        <th> Hospedagem de site </th>
                        <td> R$ 500,00 </td>
                    </tr>
                </tbody>

                <!-- Mão de obra -->
                <thead>
                    <tr>
                        <th colspan="2" class="text-center table-warning h5">Mão de obra</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th> Programador Full-Stack </th>
                        <td> R$ 2000,00 </td>
                    </tr>

                    <tr>
                        <th> Designer </th>
                        <td> R$ 1000,00 </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-success d-inline" id="exibir-projeto-1" onclick="exibeProjeto(1)">Exibir projeto</button>
        <button type="button" class="btn btn-danger d-none" id="esconder-projeto-1" onclick="escondeProjeto(1)">Esconder projeto</button>

    </div>

    <div id="projeto-2" class="border border-secondary p-3 mb-3 text-center">
        <h2 class="titulo-projeto"> Manutenção do site da prefeitura </h2>

        <div class="table-responsive d-none" id="tabela-2">
            <table class="table table-striped table-hover">

                <!-- Detalhes gerais -->
                <thead>
                <tr>
                    <th colspan="2" class="text-center table-primary h5">Detalhes gerais</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th> Custo total: </th>
                    <td> R$ 5700.20 </td>
                </tr>

                <tr>
                    <th> Colaboradores: </th>
                    <td> 10 </td>
                </tr>

                <tr>
                    <th> Data de início </th>
                    <td> 31/08/2020 </td>
                </tr>

                <tr>
                    <th> Prazo final </th>
                    <td> 31/09/2020 </td>
                </tr>

                <tr>
                    <th> Tempo de conclusão </th>
                    <td> 30 dias </td>
                </tr>

                <tr>
                    <th> Detalhes </th>
                    <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet illo impedit inventore nemo nesciunt officiis sed. Aspernatur ducimus exercitationem fuga inventore necessitatibus odio odit perferendis reprehenderit veniam vitae. Tenetur! </td>
                </tr>
                </tbody>

                <!-- Materiais -->
                <thead>
                <tr>
                    <th colspan="2" class="text-center table-secondary h5">Materiais</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th> IDE Visual Studio </th>
                    <td> R$ 200,00 </td>
                </tr>

                <tr>
                    <th> Direitos de imagem </th>
                    <td> R$ 300,00 </td>
                </tr>

                <tr>
                    <th> Hospedagem de site </th>
                    <td> R$ 500,00 </td>
                </tr>
                </tbody>

                <!-- Mão de obra -->
                <thead>
                <tr>
                    <th colspan="2" class="text-center table-warning h5">Mão de obra</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th> Programador Full-Stack </th>
                    <td> R$ 2000,00 </td>
                </tr>

                <tr>
                    <th> Designer </th>
                    <td> R$ 1000,00 </td>
                </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-success d-inline" id="exibir-projeto-2" onclick="exibeProjeto(2)">Exibir projeto</button>
        <button type="button" class="btn btn-danger d-none" id="esconder-projeto-2" onclick="escondeProjeto(2)">Esconder projeto</button>

    </div>

</section>

</body>

</html>