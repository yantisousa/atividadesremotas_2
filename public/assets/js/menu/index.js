$('#logout').click(function(){
    logout();
})
function logout(){
    $.ajax({
        url: '/login/logout/',
        type: 'get',
        success: function(){
            // location.reload();
        }
    })
}
