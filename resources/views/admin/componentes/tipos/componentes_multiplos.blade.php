<div style="display: none; width: 100%;" id="group2" class="group-form">
    @isset($componente)
        @isset($componente->elementos)
            @include('admin.componentes.forms.elemLista', ['elementos' => $componente->elementos])
        @endisset
        @include('admin.componentes.forms.elemClone', ['componente' => $componente, 'id' => '_img', ''])
    @else
        @include('admin.componentes.forms.elemClone', ['componente' => '', 'id' => '_img', ''])
    @endisset
</div>