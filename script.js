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
                    <input type="text" id="material${i}" name="material[]" class="form-control max-length input-obrigatorio" placeholder="Ex.: IDE Jetbrains" maxlength="50">
                    <div class="invalid-feedback"> Preencha este campo ou diminua a quantidade de caracteres (max: 50) </div>
                </div> <br>

                <div class="form-group">
                    <label for="materialPreco${i}">Preço</label> <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" id="materialPreco${i}" name="materialPreco[]" class="form-control input-obrigatorio money">
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
    //trocando a classe d-none da div da tabela
    $(`#tabela-${indice}`).removeClass('d-none')

    //Escondendo botão de exibir projeto
    $(`#exibir-projeto-${indice}`).removeClass('d-inline').addClass('d-none')

    //exibindo botão de esconder projeto
    $(`#esconder-projeto-${indice}`).removeClass('d-none').addClass('d-inline')

    //exibir botão de excluir projeto
    $(`#excluir-projeto-${indice}`).removeClass('d-none').addClass('d-inline')
}

//esconder um projeto
function escondeProjeto(indice){
    //adicionando de volta a classe d-none para tabela
    $(`#tabela-${indice}`).addClass('d-none')

    //Escondendo botão de esconder projeto
    $(`#esconder-projeto-${indice}`).removeClass('d-inline').addClass('d-none')

    //exibindo botão de exibir projeto
    $(`#exibir-projeto-${indice}`).removeClass('d-none').addClass('d-inline')

    //Escondendo botão de excluir projeto
    $(`#excluir-projeto-${indice}`).removeClass('d-inline').addClass('d-none')
}

function validaFormulario(){
    let nome = $('#nome').val()
    let descricao = $('#descricao').val()
    let dataInicio = $('#dataInicio').val()
    let dataFim = $('#dataFim').val()
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

    //data final > data inicial
    if(dataFim.length === 10){
        //separando string em arrays -> [0] = ano | [1] = mes | [2] = dia
        let arrDataInicio = dataInicio.split('-')
        let arrDataFim = dataFim.split('-')

        //consertando o mês dos arrays para o objeto de data
        arrDataInicio[1] = Number(arrDataInicio[1]) - 1
        arrDataFim[1] = Number(arrDataFim[1]) - 1

        console.log(arrDataInicio, arrDataFim)

        //criando objetos de data
        let objDataInicio = new Date(arrDataInicio[0], arrDataInicio[1], arrDataInicio[2])
        let objDataFim = new Date(arrDataFim[0], arrDataFim[1], arrDataFim[2])

        //calculando a diferença
        let milissegundos_entre_datas = objDataFim.getTime() - objDataInicio.getTime()

        if(milissegundos_entre_datas < 0){
            valido = false
            $('#dataFim').addClass('is-invalid')
        } else{
            $('#dataFim').removeClass('is-invalid')
        }
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
        window.location.href=`logica/dados_consultar_excluir.php?id_projeto=${id_projeto}`
    })
}