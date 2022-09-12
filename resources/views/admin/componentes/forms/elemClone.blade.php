<div style="display: flex;">
    <div class="form-group col-md-4">
        <div class="form-group col-md-12">
            <label for="titulo2">Titulo</label>
            <input type="text" class="form-control" id="titulo2" name="subtitulo" placeholder="Titulo da elemento" value="{{ isset($elemento->subtitulo) ? $elemento->subtitulo : '' }}">
        </div>

        <div class="form-group col-md-12">
            <label for="{{ isset($id) ? $id : '' }}">Imagem</label>
            <div class="form-group">
                <input  {{ isset($id) ? "" : "disabled" }} type="file" class="hidden" id="{{ isset($id) ? $id : '' }}" name="{{ isset($id) ? $id : '' }}" value="">
                <label for="{{ isset($id) ? $id : '' }}">
                    <img for="{{ isset($id) ? $id : '' }}" src="{{ isset($elemento->img)  ? asset($elemento->img) : asset('img/admin/avatar.png') }}" class="img-thumbnail" width="100" height="100">
                    <input type="hidden" name="img_antiga" value="{{ isset($elemento->img) ? $elemento->img : '' }}">
                </label>

                @if(!isset($id))
                    <button style="margin-left: 10px" type="button" class="btn btn-danger" onclick="deleteComponente({{ isset($elemento) ? $elemento->id_elemento : 0 }})">Excluir</button>
                @endif
            </div>
        </div>
    </div>

    <section class="content">
        <label for="">Texto</label>
        <div class="card-body">
            <textarea name="{{ isset($id) ? 'texto' : '' }}" class="summernote">
            {{ isset($elemento->texto) ? $elemento->texto : '' }}
            </textarea>
        </div>
    </section>

</div>