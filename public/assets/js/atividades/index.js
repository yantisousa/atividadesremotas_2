const _token = $('#_token').val();
function editar(id){
    $.ajax({
        url: '/atividades/edit/' + id,
        type: 'get',
        success: function(dados){
            $('#id-atividade').val(dados.id);
            $('#exampleFormControlInput1').val(dados.name);
            $('#description').val(dados.description);
            $('#imagem').attr('src', `http://localhost:8000/storage/${dados.filepath}`);
        }
    })
}
function update(){
    const name = $('#exampleFormControlInput1').val();
    const filepath = $('#file').val();
    const description =  $('#description').val();
    const id = $('#id-atividade').val();
    var formData = new FormData();
    formData.append('file', $('#file')[0].files[0]);
    dadosInput = {
        name, description, id, filepath, _token
    }
        $.ajax({
            url: '/atividades/update/',
            type: 'put',
            data: dadosInput,
            success: function(dados){
                console.log(dados);
                
            }
        })

    

}