<link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">

@csrf
<div style="display: flex;">
    <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ isset($componente->nome) ? $componente->nome : '' }}">
    </div>

    <div class="form-group col-md-4">
        <label for="tipo">Tipo</label>
        <select class="form-control" name="tipo" id="tipo">
            <option value="">-</option>
            @foreach(App\Helpers\ComponenteTipoHelper::$tipos as $key => $value)
            <option value="{{ $key }}" {{ isset($componente) && $componente->tipo == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="titulo1">Titulo</label>
        <input type="text" class="form-control" id="titulo1" name="titulo" placeholder="Titulo da componente" value="{{ isset($componente->titulo) ? $componente->titulo : '' }}">
    </div>
</div>

@isset($componente)
    @include('admin.componentes.tipos.componente_unico', ['componente' => $componente])
    @include('admin.componentes.tipos.componentes_multiplos', ['componente' => $componente])
    @include('admin.componentes.tipos.componente_form', ['componente' => $componente])
@else
    @include('admin.componentes.tipos.componente_unico')
    @include('admin.componentes.tipos.componentes_multiplos')
    @include('admin.componentes.tipos.componente_form')
@endisset


<script>
    $(document).ready(function() {
        Crop.iniciarCrop('componentes', 'img');
        $('.summernote').summernote({
            height: 148,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
            // remover todas as fonts
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['Font Awesome 5 Free']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            width: '40vw',

        });
        
        Utils.changeType($('#tipo').val());
        $('#tipo').change(function(){
            Utils.changeType(this.value);
        })

    });
</script>
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>