import Crop from './crop';

const Form = {

    beforeunloadFuncs: [],

    build_form: function (rota) {
        route = rota.toLowerCase();
        route = route.split(' ')
        route[1] = route[1].charAt(0).toUpperCase() + route[1].slice(1);
        route = route.join('');
    
        $.ajax({
            url: 'modals/' + route,
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#modal-body').html(data);
                $('.modal-title').html(rota);
                $('#modal-save').attr('onclick', 'save_' + route + '()');
            }
        })
    },

    salvarForm: function(form, url, redirect) {
        var divForm = $('#'+form).children('div').not('.form-inactive');
        var total = divForm.find('input[required]').filter(function() {
            return this.value == '';
        })

        if (total.length > 0) {
            toastr.error('Preencha todos os campos!', 'Erro');
            return false;
        }
        else {
            var dados = $('#'+form).serialize().split('&');
            dados = dados.filter(function(item) {
                item = decodeURI(item).trim();
                if(item.split('=')[1] != '' && item.split('=')[1] != ' ') {
                    return item;
                }
            });
            console.log(dados);
            dados = dados.join('&');
        
            $.ajax({
                url: url,
                type: 'POST',
                data: dados,
                success: function(data) {
                    toastr.success(data);
                    Crop.cancelarExcluirCrop();
                    setTimeout(function() {
                        window.location.href = redirect;
                    }, 2000);
                },
                error: function(data) {
                    toastr.error(data);
                }
            });
        
        }
    },

    recarregarForm: function() {
        window.addEventListener('beforeunload', function(e){
            if(Form.beforeunloadFuncs.length > 0){
                e.preventDefault();

                Form.beforeunloadFuncs.forEach(function(cropDir){
                    Crop.eventoEcluir(cropDir);
                });
            }
        });
    }
}

export default Form;
