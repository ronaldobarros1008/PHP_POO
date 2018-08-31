function fn_excluir(){
    $('.form_excluir').submit(function(){
        return confirm("Click Ok para continuar?");
    });
}

function load_modal(nome, email, id){
    $('#text_nome').val(nome);
    $('#text_email').val(email);
    $('#id_uii').val(id);
}


