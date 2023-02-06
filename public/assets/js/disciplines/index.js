function logout(id){
    console.log(id);
    $.ajax({
        url: '/destroy/professor/' + id,
        type: 'get', 
        success: function(dados){
            location.reload();
        }
    })
}
