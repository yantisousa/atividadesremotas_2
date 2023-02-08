$('#pendentes').click(function() {
    id = $('#id-disciplina').val();
    var manipulaPage1 = $('#manipuladorPage-1').val();
    $.ajax({
        url: '/atividades/index/' + id,
        type: 'get',
        data:{
            manipulaPage1
        },
        success: function(dados){

        }
    })
})
$('#feitas').click(function() {
    id = $('#id-disciplina').val();
    manipulaPage2 = $('#manipuladorPage-2').val();
    $.ajax({
        url: '/atividades/index/' + id,
        type: 'get',
        data: {
            manipulaPage2
        },
        success: function(dados){

        }
    })
})