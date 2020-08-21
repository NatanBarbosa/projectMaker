$(document).ready( () => {

    //animação do toggle
    $('#bars').on( 'click', e => $(e.target).toggleClass('virado') )

    //Input da data
    let data = new Date
    let dia = Number(data.getDate())
    let mes = Number(data.getMonth()) + 1
    let ano = Number(data.getFullYear())

    if(dia < 10){
        dia = `0${dia}`
    }
    if(mes < 10){
        mes = `0${mes}`
    }

    $('#dataInicio').val(`${ano}-${mes}-${dia}`)

    //implementar função de adicionar material
    let i = 1
    $('#addMaterial').on('click', () => {

        $('#addMaterial').before(
            `<div id="material${i}" class="border border-secondary p-3">
                <h5 class="text-primary">Material ${i}</h5>

                <div class="form-group">
                    <label for="material${i}">Material/produto</label> <br>
                    <input type="text" id="material${i}" name="nome_material[]" class="form-control max-length input-obrigatorio" placeholder="Ex.: IDE Jetbrains" maxlength="50">
                    <div class="invalid-feedback"> Preencha este campo ou diminua a quantidade de caracteres (max: 50) </div>
                </div> <br>

                <div class="form-group">
                    <label for="materialPreco${i}">Preço</label> <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" id="materialPreco${i}" name="preco[]" class="form-control input-obrigatorio money">
                        <div class="invalid-feedback"> Informe o preço </div>  
                    </div>
                </div> <br>

                <button type="button" class="btn btn-danger" id="removerMaterial${i}"> <i class="fas fa-trash"></i> </button>
            </div>`
        )

        //implementar função de remover material
        $('#materiais').on('click', `#removerMaterial${i}`, e => {
            $(e.target).closest('div').remove()
        })

        //implementar máscara no preço
        $('.money').mask('#.##0,00', {reverse: true});

        
        //evitar repetição de id
        i++ 
    })

    //implementar função de adicionar funcionário
    let x = 1
    $('#addFuncionario').on('click', () => {

        $('#addFuncionario').before(
            `<div id="material${x}" class="border border-secondary p-3">
                <h5 class="text-primary">Funcionário ${x}</h5>

                <div class="form-group">
                    <label for="funcao${x}">Função</label> <br>
                    <input type="text" id="funcao${x}" name="funcao[]" class="form-control max-length input-obrigatorio" placeholder="Ex.: Programador" maxlength="50">
                    <div class="invalid-feedback"> Preencha este campo ou diminua a quantidade de caracteres (max: 50) </div>            
                </div> <br>

                <div class="form-group">
                    <label for="salario${x}">Salário</label> <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" id="salario${x}" name="salario[]" class="form-control input-obrigatorio money">
                        <div class="invalid-feedback"> Informe o salário </div>  
                    </div>
                </div> <br>

                <button type="button" class="btn btn-danger" id="removerFuncionario${x}"> <i class="fas fa-trash"></i> </button>
            </div>`
        )

        //implementar função de remover funcionário
        $('#funcionarios').on('click', `#removerFuncionario${x}`, e => {
            $(e.target).closest('div').remove()
        })

        //implementar máscara no preço
        $('.money').mask('#.##0,00', {reverse: true});
        
        x++
    })
    
} )

//Exibir um projeto
function exibeProjeto(indice){
    //escondendo um projeto caso esteja exibindo
    $('.projeto').addClass('d-none')
    $('.exibir').removeClass('d-none')
    $('.esconder').addClass('d-none')

    //trocando a classe d-none da div do projeto
    $(`#projeto-${indice}`).removeClass('d-none')

    //trocando o botão de exibir pelo de ocultar no card
    $(`#exibir-projeto-${indice}`).addClass('d-none')
    $(`#esconder-projeto-${indice}`).removeClass('d-none')

    //scrollando para baixo
    $('html, body').animate({
        scrollTop: $(`#projeto-${indice}`).offset().top
    }, 'slow');
}

//esconder um projeto
function escondeProjeto(indice){
    //adicionando de volta a classe d-none para o projeto
    $(`#projeto-${indice}`).addClass('d-none')

    //scrollando para cima
    $('html, body').animate({
        scrollTop: $('nav').offset().top
    }, 'slow');

    //trocando o botão de exibir pelo de ocultar no card
    $(`#exibir-projeto-${indice}`).removeClass('d-none')
    $(`#esconder-projeto-${indice}`).addClass('d-none')
}

function validaData(update = false, _dataInicio, _dataFim) {
    let dataInicio = null
    let dataFim = null
    if(!update){
        dataInicio = $('#dataInicio').val()
        dataFim = $('#dataFim').val()
    } else {
        dataInicio = _dataInicio
        dataFim = _dataFim
    }

    //data final > data inicial
    if(dataFim.length === 10){
        //separando string em arrays -> [0] = ano | [1] = mes | [2] = dia
        let arrDataInicio = dataInicio.split('-')
        let arrDataFim = dataFim.split('-')

        //consertando o mês dos arrays para o objeto de data
        arrDataInicio[1] = Number(arrDataInicio[1]) - 1
        arrDataFim[1] = Number(arrDataFim[1]) - 1

        //criando objetos de data
        let objDataInicio = new Date(arrDataInicio[0], arrDataInicio[1], arrDataInicio[2])
        let objDataFim = new Date(arrDataFim[0], arrDataFim[1], arrDataFim[2])

        //calculando a diferença
        let milissegundos_entre_datas = objDataFim.getTime() - objDataInicio.getTime()

        if(milissegundos_entre_datas < 0){
            $('#dataFim').addClass('is-invalid')
            return false
        } else{
            $('#dataFim').removeClass('is-invalid')
        }
    }
}

function validaFormulario(){
    let nome = $('#nome').val()
    let descricao = $('#descricao').val()
    let dataInicio = $('#dataInicio').val()
    let valido = true

    //campos not nullable
    //verificando nome
    if( nome.length === 0 || nome.length > 50){
        $('#nome').addClass('is-invalid')
        valido = false
    } else{
        $('#nome').removeClass('is-invalid')
    }

    //verificando descrição
    if( descricao.length === 0 ){
        $('#descricao').addClass('is-invalid')
        valido = false
    } else{
        $('#descricao').removeClass('is-invalid')
    }

    //verificando data
    if( dataInicio.length < 10 ){
        $('#dataInicio').addClass('is-invalid')
        valido = false
    } else{
        $('#dataInicio').removeClass('is-invalid')
    }

    //verificando data
    if ( validaData() === false ){
        valido = false
    }

    //verificando se os inputs de materiais e funcionarios estão preenchidos
    $.each( $('.input-obrigatorio'), (i, input) => {
        if( input.value.length === 0 ){
            $(input).addClass('is-invalid')
            valido = false
        } else {
            $(input).removeClass('is-invalid')

            //verificando se esse inputs são maiores que 50 caracteres
            if( input.value.length > 50 ){
                valido = false
                $(input).addClass('is-invalid')
            } else{
                $(input).removeClass('is-invalid')
            }
        }
    } )

    if(valido){
        $('#criarProjeto').submit()
    } else{
        $('#aviso').html('conserte os erros para prosseguir')
    }

}

function excluiProjeto(id_projeto, nome_projeto){
    //modal
    $('#confirma-excluir').modal('show')
    $('#inserir-nome-projeto').html(nome_projeto)

    //excluir
    $('#excluir').on('click', () => {
        window.location.href=`logica/dados_criar_instancias.php?id_projeto=${id_projeto}`
    })
}

function confirmaCadastro() {
    let email = $('#novo_email').val()
    let senha = $('#nova_senha').val()
    let confirma_senha = $('#confirma_senha').val()
    let valido = true

    //campos not null
    if (email.length === 0 || senha.length === 0 || confirma_senha.length === 0){
        valido = false
        $('#novo_email').addClass('is-invalid')
        $('#nova_senha').addClass('is-invalid')
    } else {
        $('#novo_email').removeClass('is-invalid')
        $('#nova_senha').removeClass('is-invalid')
    }

    //email
    if( email.indexOf("@") === -1 ){
        valido = false
        $('#novo_email').addClass('is-invalid')
    } else {
        $('#novo_email').removeClass('is-invalid')
    }

    //senha == confirma senha
    if(senha !== confirma_senha){
        valido = false
        $('#confirma_senha').addClass('is-invalid')
    } else {
        $('#confirma_senha').removeClass('is-invalid')
    }

    if(valido){
        $('#cadastro_form').submit()
    } else {
        $('#cadatro_erro').html('corrija os erros para continuar')
    }

}

//editar projeto
function editionStart(id_projeto){
    //escondendo botões
    $(`#editar-projeto-${id_projeto}`).addClass('d-none')
    $(`#esconder-projeto-${id_projeto}`).addClass('d-none')
    $(`#excluir-projeto-${id_projeto}`).addClass('d-none')

    //exibindo botões
    $(`#salvar-edicao-${id_projeto}`).removeClass('d-none')
    $(`#cancelar-edicao-${id_projeto}`).removeClass('d-none')
    $(`#edicao-aviso-${id_projeto}`).removeClass('d-none')

    //colocando um hover e estilo
    $(`.editavel-${id_projeto}`).hover(
        e => $(e.target).css({'cursor': 'pointer', 'border': '1px solid lightgreen'}),
        e => $(e.target).css({'border': 'none'})
    )

    $(`.nao-editavel-${id_projeto}`).hover(
        e => $(e.target).css({'cursor': 'not-allowed', 'border': '1px solid lightcoral'}),
        e => $(e.target).css({'border': 'none'})
    )


    $(`.editavel-${id_projeto}`).each( (i, campo) => {
        campo.onclick = e => {

            //inserindo um input no lugar dos valores
            if( $(e.target).hasClass('input-text') ){
                $(e.target).html(`<input type="text" required name="${$(e.target).attr('data-name')}" value="${$(e.target).attr('data-value')}" class="form-control" id="dataInicio">`)

            } else if( $(e.target).hasClass('textarea') ){
                $(e.target).html(`<textarea required name="${$(e.target).attr('data-name')}" class="form-control"> ${$(e.target).attr('data-value')} </textarea>`)

            }
        }
    } )
}

function verificar_enviar_mudancas(id_projeto){
    //verificando a data
    let valido = true
    let dataInicio = ''
    let dataFim = ''
    
    //validar se os campos estão preenchidos
    $('.form-control').each( (i, input) => {
        //verificar se a data está preenchida
        if( $(input).attr('type') === 'date' ){
            if(input.value.length < 10){
                valido = false
            }
        }

        //verificar se os outros inputs estão preenchidos
        if( $(input).attr('type') !== 'date' ){
            if(input.value.length === 0){
                valido = false
            }
        }

    } )

    if( validaData( true, dataInicio, dataFim ) === false ){
        alert('a data final deve ser maior que a data inicial')
    } else if(valido) {
       $(`#form-editar-${id_projeto}`).submit()
    } else {
        alert('preencha todos os campos')
    }

}