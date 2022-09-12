<div style="display: none; width: 100%;" id="group3" class="group-form">
    <div>
        <div class="form-group col-md-4">
            <label for="email">Destinatario</label>
            @isset($componente)
                <input required type="text" class="form-control" placeholder="Email comercial" id="email" name="email" value="{{ isset($componente->elementos->{$componente->id_elemento}->email) ? $componente->elementos->{$componente->id_elemento}->email : '' }}">
            @else
                <input required type="text" class="form-control" placeholder="Email comercial" id="email" name="email" value="">
            @endisset
        </div>
    </div>
    @isset($componente)
        @isset($componente->elementos)
            @include('admin.componentes.forms.formLinkLista', ['elementos' => $componente->elementos])
        @endisset
        @include('admin.componentes.forms.formLinkClone', ['componente' => $componente, 'id' => '_img', ''])
    @else
        @include('admin.componentes.forms.formLinkClone', ['componente' => '', 'id' => '_img', ''])
    @endisset
</div>