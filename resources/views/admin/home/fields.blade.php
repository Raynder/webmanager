@csrf
<div style="display: flex;">
    <div class="form-group col-md-8">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da pagina" value="{{ isset($pagina) ? $pagina->nome : '' }}">
    </div>
    <!-- <div class="form-group col-md-4">
        <label for="_img">Imagem</label>
        <div class="form-group">
            <input type="file" class="hidden" id="_img" name="_img" value="">
            <input type="text" class="hidden" id="img_antiga" name="img_antiga" value="{{ isset($pagina) ? $pagina->img : '' }}">
            <label for="_img">
                <img for="_img" src="{{ isset($pagina->img) ? asset($pagina->img) : asset('img/admin/avatar.png') }}" class="img-thumbnail" width="100" height="100">
            </label>
        </div>
    </div> -->
</div>

<script>
    $(document).ready(function(){
        Crop.iniciarCrop('paginas','img', 1);
        Form.recarregarForm();
    });
</script>