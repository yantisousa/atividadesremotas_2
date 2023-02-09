function atividadesFeitas(id){
    var manipulador = $('#input-manipulador2').val();
    $.ajax({
        url: '/alunos/atividades/niveis/' + id,
        type: 'get',
        data: {
            manipulador,
        },
        success: function(dados){
            $('#title2').text(dados);
            console.log(dados);
        }
    })
}
function atividadesPendentes(id){
    var manipulador = $('#input-manipulador1').val();
    $.ajax({
        url: '/alunos/atividades/niveis/' + id,
        type: 'get',
        data: {
            manipulador,
        },
        success: function(dados){
            console.log(dados);
            $('#title1').text(dados);
        }
    })
}
function visualizarImage(id){
    $.ajax({
        url: '/alunos/atividades/image/' + id,
        type: 'get',
        success: function(dados){
            console.log(dados.filepath);
            $('#image').append(dados.filepath)
        }
    })
}
