$('#student-click').click(function(){
    $('#student-click').addClass('is-active');
    $('#teacher-click').removeClass('is-active');
    if($('.active')){
        $('#professores').hide();
    $('#alunos').show();
    }

})
$('#teacher-click').click(function(){
    $('#teacher-click').addClass('is-active');
    $('#student-click').removeClass('is-active');
    if($('.active')){
        $('#alunos').hide();
        $('#professores').show();
    }

})
// $('.active').click(() => {
//     alert('ok');
// })
