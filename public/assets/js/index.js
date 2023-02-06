$('.btn-edit').click(function(){
});
function excluir(id) {
    $.ajax({
        url: '/disciplines/destroy/' + id,
        type: 'get',
        success: function () {
        }
    });

}
