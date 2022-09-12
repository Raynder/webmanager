@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Atualizar pagina</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('componentes') }}">Editar</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#cabecalho" data-toggle="tab">Cabeçalho</a></li>
                <li class="nav-item"><a class="nav-link" href="#corpo" data-toggle="tab">Corpo</a></li>
                <li class="nav-item"><a class="nav-link" href="#rodape" data-toggle="tab">Rodapé</a></li>
            </ul>
        </div>
        
        <div class="card-body">
            <div class="tab-content">

                @foreach($elementos as $key => $elemento)
                    @if($key == 'cabecalho')
                        <div class="tab-pane active" id="{{ $key }}">
                    @else
                        <div class="tab-pane" id="{{ $key }}">
                    @endif
                    <section class="content pb-3">
                        <div class="container-fluid h-100">
                            <div class="card card-row card-primary" id="{{ $key }}_all">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $pagina->nome }}
                                    </h3>
                                </div>
                                <div class="lista_de_componentes">
                                @foreach($elemento as $componentepg)
                                <div class="card-body">
                                    <div class="card {{ $key }}-comp card-info card-outline" id="{{ $componentepg->id }}" componente_id="{{ $componentepg->componente_id }}">
                                        <div class="card-header">
                                            <h5 class="card-title">{{ $componentepg->nome }}</h5>
                                            <div class="card-tools">
                                                <a onclick="removeComponente(this)" class="btn btn-tool">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
                                <script>
                                    $(function() {
                                        $('.lista_de_componentes').sortable();
                                    });
                                </script>
                                </div>
                            </div>
                            <select class="form-control" id="comp_{{ $key }}">
                                @foreach($componentes as $componente)
                                <option value="{{ $componente->id }}">{{ $componente->nome }}</option>
                                @endforeach
                            </select>
                            <button style="margin-top: 10px;" onclick="addComponente('{{ $key }}')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus"></i>
                                Adicionar componente
                            </button>
                            <button style="margin-top: 10px;" onclick="salvar('{{ $key }}')" type="button" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Salvar
                            </button>
                    </section>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>
@endsection

<script>
    function addComponente(tipo) {
        allcomponentes = document.getElementById(tipo+'_all').innerHTML;
        compID = document.getElementById('comp_'+tipo).value;
        compNome = document.getElementById('comp_'+tipo).options[document.getElementById('comp_'+tipo).selectedIndex].text;

        // adicionar um elemento filho em all_componentes
        document.getElementById(tipo+'_all').innerHTML = allcomponentes + '<div class="card-body"><div class="card '+tipo+'-comp card-info card-outline" componente_id="'+compID+'"><div class="card-header"><h5 class="card-title">' + compNome + '</h5><div class="card-tools"></div></div></div></div>';
    }

    function removeComponente(element) {
        elem = element.parentNode.parentNode.parentNode;
        elem.parentNode.removeChild(elem);

        id = elem.id;
        $.ajax({
            url: '{{ route("componentes.destroy", ":id") }}'.replace(':id', id),
            type: 'get',
            success: function(result) {
                Alertas.alertaSucesso(result);
            }
        });
    }

    function salvar(tipo){
        tipos = {
            'cabecalho': 1,
            'corpo': 2,
            'rodape': 3
        };

        componentes = document.getElementsByClassName(tipo+'-comp');
        componentes_id = [];
        for(i = 0; i < componentes.length; i++){
            componentes_id.push(componentes[i].getAttribute('componente_id'));
        }

        $.ajax({
            url: '{{ route('componente.addAll') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                componentes_id: componentes_id,
                pagina_id: {{ $pagina->id }},
                tipo: tipos[tipo]
            },
            success: function(data){
                Alertas.alertaSucesso(data);
            },
            error: function(data){
                Alertas.alertaErro(data.responseJSON);
            }
        });
    }


</script>