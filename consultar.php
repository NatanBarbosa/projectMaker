<?php
    require_once 'logica/session_validate.php';

    require_once "logica/dados_consultar.php";
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

    <? foreach ($lista_informacoes as $i => $li) {
        $lista_materiais = $bd->selectProjeto_materiais($li->id_projeto);
        $lista_funcionarios = $bd->selectProjeto_funcionarios($li->id_projeto);    
    ?>
        <div id="projeto-1" class="border border-secondary p-3 mb-3 text-center">
            <h2 class="titulo-projeto"> <?= $li->nome ?> </h2>

            <div class="table-responsive d-none" id="tabela-<?=$li->id_projeto?>">
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
                        <td> R$ <?= $li->custo_total ?> </td>
                    </tr>

                    <? if($li->colaboradores != null) {?>
                        <tr>
                            <th> Colaboradores: </th>
                            <td> <?= $li->colaboradores?> </td>
                        </tr>
                    <? } ?>
                    
                    <? $arrDataInicio = explode('-',$li->data_inicio); ?>
                    <tr>
                        <th> Data de início </th>
                        <td> <?= $arrDataInicio[2] . '/' . $arrDataInicio[1] . '/' . $arrDataInicio[0] ?> </td>
                    </tr>

                    <? if( $li->data_fim != null ) {
                        $arrDataFim = explode('-', $li->data_fim)    
                    ?>
                        <tr>
                            <th> Prazo final </th>
                            <td> <?= $arrDataFim[2] . '/' . $arrDataFim[1] . '/' . $arrDataFim[0] ?> </td>
                        </tr>

                        <tr>
                            <th> Tempo de conclusão </th>
                            <td> <?= $li->tempo_previsto ?> dias </td>
                        </tr>
                    <? } ?>

                    <tr>
                        <th> Detalhes </th>
                        <td> <?= $li->detalhes ?> </td>
                    </tr>
                    </tbody>
                    
                    <!-- Materiais -->
                    <?if( count($lista_materiais) != 0 ) {  ?>
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center table-secondary h5">Materiais</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <? foreach($lista_materiais as $lm) { ?>
                                <tr>
                                    <th> <?= $lm->nome_material ?> </th>
                                    <td> R$ <?= $lm->preco ?> </td>
                                </tr>
                            <? } ?>
                        </tbody>
                    <? } ?>

                    <!-- Mão de obra -->
                    <?if( count($lista_funcionarios) != 0 ) {  ?>
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center table-warning h5">Mão de obra</th>
                            </tr>
                        </thead>
                        
                        <? foreach($lista_funcionarios as $lf) {?>
                            <tbody>
                                <tr>
                                    <th> <?= $lf->funcao ?> </th>
                                    <td> R$ <?= $lf->salario ?> </td>
                                </tr>
                            </tbody>
                        <? } ?>
                    <? } ?>
                </table>
            </div>

            <button type="button" class="btn btn-success d-inline" id="exibir-projeto-<?= $li->id_projeto?>" onclick="exibeProjeto(<?= $li->id_projeto ?>)">Exibir projeto</button>
            <button type="button" class="btn btn-danger d-none" id="esconder-projeto-<?= $li->id_projeto?>" onclick="escondeProjeto(<?= $li->id_projeto ?>)">Esconder projeto</button>

        </div>
    <? } ?>

</section>

</body>

</html>