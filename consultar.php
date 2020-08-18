<?php
require_once 'logica/session_validate.php';

require_once "logica/dados_criar_instancias.php";
$lista_informacoes = $bd->selectProjeto_informacoes();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Crie seu projeto</title>
    <link rel="icon" type="img/png" href="imagens/logo_icon.png">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"
            integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
            crossorigin="anonymous"></script>

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
                        <a href="criar.php" class="nav-link primeiro"> <i class="fas fa-edit"></i> &nbsp; Criar Projeto
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="consultar.php" class="nav-link ativo"> <i class="fas fa-search"></i> &nbsp; Consultar
                            Projeto </a>
                    </li>

                    <li class="nav-item">
                        <a href="info.php" class="nav-link"> &nbsp; <i class="fas fa-info"></i> &nbsp; Sobre o site </a>
                    </li>

                    <li class="nav-item">
                        <a href="logica/session_destroy.php" class="nav-link logoff"> &nbsp; <i
                                    class="fas fa-sign-out-alt"></i> &nbsp; Deslogar </a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</header>

<section class="container py-3 mb-3" id="pagina-consulta">

    <!--Mensagem de exclusão-->
    <? if (isset($_GET['excluir']) && $_GET['excluir'] === 'sucesso') { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            Seu projeto foi excluido
        </div>
    <? } ?>

    <!--Mensagem de atualização-->
    <? if (isset($_GET['atualizar']) && $_GET['atualizar'] === 'sucesso') { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            Seu projeto foi atualizado
        </div>
    <? } ?>

    <h1>Consulte seus projetos</h1>

    <hr>

    <? if (count($lista_informacoes) === 0) { ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">OPS!</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nenhum projeto encontrado</h6>
                <p class="card-text">Você até o momento não criou nenhum projeto. Crie um projeto agora clicando no
                    botão ou no link de criar projeto no menu acima </p>
                <a href="criar.php" class="card-link btn btn-info">Criar agora</a>
            </div>
        </div>
    <? } ?>

    <?
    foreach ($lista_informacoes as $i => $li) {
        $lista_materiais = $bd->selectProjeto_materiais($li->id_projeto);
        $lista_funcionarios = $bd->selectProjeto_funcionarios($li->id_projeto);
        ?>
        <form method="post" action="logica/dados_criar_instancias.php?acao=atualizar" id="form-editar-<?=$li->id_projeto?>">

            <div id="projeto-1" class="border border-secondary p-3 mb-3 text-center">
                <h2 class="titulo-projeto editavel-<?= $li->id_projeto ?> input-text"
                    id="nome-proj-<?= $li->id_projeto ?>"
                    data-name="informacoes_gerais[nome-<?=$li->id_projeto?>]"
                    data-value="<?= $li->nome ?>">
                    <?= $li->nome ?>
                </h2>

                <div class="table-responsive d-none" id="tabela-<?= $li->id_projeto ?>">
                    <table class="table table-striped table-hover">

                        <!-- Detalhes gerais -->
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center table-primary h5">Detalhes gerais</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th> Custo total:</th>
                            <td class="nao-editavel-<?= $li->id_projeto ?>"> R$ <?= $li->custo_total ?> </td>
                        </tr>

                        <? if ($li->colaboradores != null) { ?>
                            <tr>
                                <th> Colaboradores:</th>
                                <td class="nao-editavel-<?= $li->id_projeto ?>"> <?= $li->colaboradores ?> </td>
                            </tr>
                        <? } ?>

                        <? $arrDataInicio = explode('-', $li->data_inicio); ?>
                        <tr>
                            <th> Data de início</th>
                            <td data-value="<?= $li->data_inicio ?>"
                                class="nao-editavel-<?= $li->id_projeto ?> input-date-inicio"
                                id="dataInicio-proj-<?= $li->id_projeto ?>"
                                data-name="informacoes_gerais[data_inicio]">
                                <?= $arrDataInicio[2] . '/' . $arrDataInicio[1] . '/' . $arrDataInicio[0] ?>
                            </td>
                        </tr>

                        <? if ($li->data_fim != null) {
                            $arrDataFim = explode('-', $li->data_fim)
                            ?>
                            <tr>
                                <th> Prazo final</th>
                                <td data-value="<?= $li->data_fim ?>" class="nao-editavel-<?= $li->id_projeto ?> input-date-fim"
                                    id="dataFim-proj-<?= $li->id_projeto ?>"
                                    data-name="informacoes_gerais[data_fim]">
                                    <?= $arrDataFim[2] . '/' . $arrDataFim[1] . '/' . $arrDataFim[0] ?>
                                </td>
                            </tr>

                            <tr>
                                <th> Tempo de conclusão</th>
                                <td class="nao-editavel-<?= $li->id_projeto ?>"> <?= $li->tempo_previsto ?> dias</td>
                            </tr>
                        <? } ?>

                        <tr>
                            <th> Detalhes</th>
                            <td class="editavel-<?= $li->id_projeto ?> textarea"
                                id="detalhes-proj-<?= $li->id_projeto ?>"
                                data-name="informacoes_gerais[detalhes-<?= $li->id_projeto ?>]"
                                data-value="<?=$li->detalhes?>">
                                <?= $li->detalhes ?>
                            </td>
                        </tr>
                        </tbody>

                        <!-- Materiais -->
                        <? if (count($lista_materiais) != 0) { ?>
                            <thead>
                            <tr>
                                <th colspan="2" class="text-center table-secondary h5">Materiais</th>
                            </tr>
                            </thead>

                            <tbody>
                            <? foreach ($lista_materiais as $lm) { ?>
                                <tr>
                                    <th class="editavel-<?= $li->id_projeto ?> input-text"
                                        id="material-<?= $lm->id_material ?>-proj-<?= $li->id_projeto ?>"
                                        data-name="materiais[nome_material-<?=$lm->id_material?>]"
                                        data-value="<?=$lm->nome_material?>">
                                        <?= $lm->nome_material ?>
                                    </th>

                                    <td class="nao-editavel-<?= $li->id_projeto ?> input-money"
                                        id="preco-<?= $lm->id_material ?>-proj-<?= $li->id_projeto ?>"
                                        data-name="materiais[preco-<?=$lm->id_material?>]"
                                        data-value="<?= $lm->preco ?>">
                                        R$ <?= $lm->preco ?>
                                    </td>
                                </tr>
                            <? } ?>
                            </tbody>
                        <? } ?>

                        <!-- Mão de obra -->
                        <? if (count($lista_funcionarios) != 0) { ?>
                            <thead>
                            <tr>
                                <th colspan="2" class="text-center table-warning h5">Mão de obra</th>
                            </tr>
                            </thead>

                            <? foreach ($lista_funcionarios as $lf) { ?>
                                <tbody>
                                <tr>
                                    <th class="editavel-<?= $li->id_projeto ?> input-text"
                                        id="funcionario-<?= $lf->id_funcionario ?>-proj-<?= $li->id_projeto ?>"
                                        data-name="funcionarios[funcao-<?=$lf->id_funcionario?>]"
                                        data-value="<?=$lf->funcao?>">
                                        <?= $lf->funcao ?>
                                    </th>

                                    <td class="nao-editavel-<?= $li->id_projeto ?> input-money"
                                        id="salario-<?= $lf->id_funcionario ?>-proj-<?= $li->id_projeto ?>"
                                        data-name="funcionarios[salario-<?=$lf->id_funcionario?>]"
                                        data-value="<?= $lf->salario ?>">
                                        R$ <?= $lf->salario ?>
                                    </td>
                                </tr>
                                </tbody>
                            <? } ?>
                        <? } ?>
                    </table>
                </div>

                <button type="button" class="btn btn-success d-inline" id="exibir-projeto-<?= $li->id_projeto ?>" onclick="exibeProjeto(<?= $li->id_projeto ?>)"><i class="fas fa-eye"></i> <small>exibir</small></button>
                <button type="button" class="btn btn-secondary d-none mb-2" id="esconder-projeto-<?= $li->id_projeto ?>" onclick="escondeProjeto(<?= $li->id_projeto ?>)"><i class="fas fa-eye-slash"></i><small>ocultar</small></button>
                <button type="button" class="btn btn-danger d-none mb-2" id="excluir-projeto-<?= $li->id_projeto ?>" onclick="excluiProjeto( <?= $li->id_projeto ?> , '<?= $li->nome ?>' )"> <i class="fas fa-trash"></i> <small>Excluir</small> </button>

                <br id="separaBotoes-<?= $li->id_projeto ?>" class="d-none">

                <button type="button" class="btn btn-outline-warning d-none" onclick="editionStart(<?= $li->id_projeto ?>)" id="editar-projeto-<?= $li->id_projeto ?>"><i class="fas fa-edit"></i> Editar projeto</button>
                <button type="button" class="btn btn-success d-none" onclick="verificar_enviar_mudancas(<?= $li->id_projeto ?>)" id="salvar-edicao-<?= $li->id_projeto ?>"><i class="fas fa-check"></i> Salvar mudanças</button>
                <button type="button" class="btn btn-danger d-none" onclick="location.reload()" id="cancelar-edicao-<?= $li->id_projeto ?>"><i class="fas fa-times"></i> Cancelar</button>
                <br>
                <span class="text-primary d-none" id="edicao-aviso-<?= $li->id_projeto ?>"> <i class="fas fa-exclamation-triangle"></i> Clique no campo que deseja editar (<small>alguns campos não são editaveis</small>) </span>


            </div>
        </form>
    <? } ?>

    <!-- Modal -->
    <div class="modal fade" id="confirma-excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <class
                    ="text-danger">Você tem certeza que deseja excluir o projeto: <br> <strong class="text-danger"
                                                                                               id="inserir-nome-projeto"></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="excluir">Excluir</button>
                </div>
            </div>
        </div>
    </div>

</section>

</body>

</html>