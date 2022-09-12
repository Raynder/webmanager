const Utils = {

    executeAjaxRemoverTr: function(url, tr){
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data){
                Alertas.alertaSucesso(data);
                // remover elemento da tabela pelo id 
                $('#'+tr).remove();
            },
            error: function(data){
                Alertas.alertaErro(data);
            }
        });
    },

    build_relatorio: function(url) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#modal-body').html(data);
                $('#modal-save').attr('onclick', 'window.print()');
            }
        })
    },

    
    changeType: function(value) {
        $('.group-form').each(function() {
            $(this).addClass('form-inactive');
            $(this).hide('slow');
        });

        if(value == 5){
            $('#group2').show('slow').removeClass('form-inactive');
        }
        else if(value == 6){
            $('#group3').show('slow').removeClass('form-inactive');
        }
        else{
            $('#group1').show('slow').removeClass('form-inactive');
        }
    },

    
    dropColors: function() {
        $('#cor_fundo').val('#000000');
        $('#cor_texto').val('#000000');
    }

}
export default Utils;