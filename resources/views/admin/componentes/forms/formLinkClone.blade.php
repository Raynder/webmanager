<div>
    <div class="form-group col-md-12" style="display: flex;">
        <div class="form-group col-md-4">
            <label for="nomelink">Nome amigavel</label>
            <input @isset($elemento) disabled="true" @else name="nomelink" id="nomelink" @endisset type="text" class="form-control" placeholder="Titulo da elemento" value="{{ isset($elemento->nomelink) ? $elemento->nomelink : '' }}">
        </div>

        <div class="form-group col-md-6">
            <label for="link">Link</label>
            <input @isset($elemento) disabled="true" @else name="link" id="link" @endisset type="text" class="form-control" placeholder="Link" value="{{ isset($elemento->link) ? $elemento->link : '' }}">
        </div>

        @isset($elemento)
            <div class="form-group col-md-2 mt-4 pt-2">
                <button style="margin-left: 10px" type="button" class="btn btn-danger" onclick="deleteComponente({{ isset($elemento) ? $elemento->id_elemento : 0 }})">Excluir</button>
            </div>
        @endisset
    </div>

</div>