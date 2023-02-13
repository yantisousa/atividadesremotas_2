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
    var url_atual = window.location.href;
    var url_new = url_atual.split('alunos/atividades/');
    $.ajax({
        url: '/alunos/atividades/image/' + id,
        type: 'get',
        success: function(dados){
            console.log(url_atual);
            $('#image').attr("src", `${url_new[0]}storage/${dados.filepath}`)
        }
    })
}
function visualizarImageAtividadesProfessor(id){
    var url_atual = window.location.href;
    var url_new = url_atual.split('response/alunos/');
    $.ajax({
        url: '/atividade/professores/alunos/' + id,
        type: 'get',
        success: function(dados){
            $('#image').attr("src", `${url_new[0]}storage/${dados.filepath}`)
        }
    })

}
var checkbox = $('.check');
if(checkbox.is(":checked")) {
    console.log("O cliente marcou o checkbox");
} else {
    console.log("O cliente não marcou o checkbox");
}



