@foreach ($elementos as $elemento)
    @include('admin.componentes.forms.elemClone', ['elemento' => $elemento])
@endforeach

<script>
    function deleteComponente(id) {
        Alertas.alertaSimNao(
            'Excluir Componente',
            function() {
                $.ajax({
                    url: '{{ route('componente.removeElemento') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Alertas.alertaSucesso(data);
                        // window.location.reload();
                    },
                    error: function(data) {
                        Alertas.alertaErro(data.responseJSON);
                        // window.location.reload();
                    }
                });
            }
        );
    }
</script>