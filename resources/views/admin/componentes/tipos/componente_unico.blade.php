<div style="display: none;" id="group1" class="group-form">
    <div style="display: flex;">
        <section class="content">
            <label>Texto</label>
            <div class="card-body">
                <textarea name="texto" class="summernote">
                    @isset($componente)
                        {{ isset($componente->elementos->{$componente->id_elemento}->texto) ? $componente->elementos->{$componente->id_elemento}->texto : '' }}
                    @endisset
                </textarea>
            </div>
        </section>
    
        <div class="form-group col-md-4">
            <label for="_img">Imagem</label>
            <div class="form-group" style="display: flex;">
                <input type="file" class="hidden" id="_img" name="_img" value="">
                <input type="text" class="hidden" id="img_antiga" name="img_antiga" value="{{ isset($componente) ? $componente->img : '' }}">
                <label for="_img">
                    @isset($componente)
                    <img for="_img" src="{{ isset($componente->elementos->{$componente->id_elemento}->img) ? asset($componente->elementos->{$componente->id_elemento}->img) : '' }}" class="img-thumbnail" width="100" height="100">
                    @else
                    <img for="_img" src="" class="img-thumbnail" width="100" height="100">
                    @endisset
                </label>
                <div class="form-group pl-3">
                    @isset($componente)
                    <input type="text" class="form-control mb-3" id="textobuton" name="textobuton" placeholder="Texto do botão" value="{{ isset($componente->elementos->{$componente->id_elemento}->textobuton) ? $componente->elementos->{$componente->id_elemento}->textobuton : '' }}">
                    <input type="text" class="form-control" id="linkbuton" name="linkbuton" placeholder="Link do botão" value="{{ isset($componente->elementos->{$componente->id_elemento}->linkbuton) ? $componente->elementos->{$componente->id_elemento}->linkbuton : '' }}">
                    @else
                    <input type="text" class="form-control mb-3" id="textobuton" name="textobuton" placeholder="Texto do botão" value="">
                    <input type="text" class="form-control" id="linkbuton" name="linkbuton" placeholder="Link do botão" value="">
                    @endisset
                </div>
            </div>

            <div class="col-md-12" style="display: flex;">
                <div class="form-group col-md-6">
                    <label for="cor_fundo">Cor do fundo</label>
                    @isset($componente)
                    <input type="color" class="form-control" id="cor_fundo" name="cor_fundo" placeholder="Cor" value="{{ isset($componente->elementos->{$componente->id_elemento}->cor_fundo) ? $componente->elementos->{$componente->id_elemento}->cor_fundo : '' }}">
                    @else
                    <input type="color" class="form-control" id="cor_fundo" name="cor_fundo" placeholder="Cor" value="">
                    @endisset
                </div>
                <div class="form-group col-md-6">
                    <label for="cor_texto">Cor do texto</label>
                    @isset($componente)
                    <input type="color" class="form-control" id="cor_texto" name="cor_texto" placeholder="Cor" value="{{ isset($componente->elementos->{$componente->id_elemento}->cor_texto) ? $componente->elementos->{$componente->id_elemento}->cor_texto : '' }}">
                    @else
                    <input type="color" class="form-control" id="cor_texto" name="cor_texto" placeholder="Cor" value="">
                    @endisset
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <input type="button" class="btn btn-primary" onclick="Utils.dropColors()" value="Remover Cores">
                </div>
            </div>
        </div>

        @isset($componente)
        <input type="hidden" name="id_elemento" value="{{ isset($componente->elementos->{$componente->id_elemento}->id_elemento) ? $componente->elementos->{$componente->id_elemento}->id_elemento : '' }}">
        @endisset
    </div>
</div>