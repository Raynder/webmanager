
@extends('layouts.app.app')

@section('content')
@foreach($componentesPagina as $componente)
    @if(App\Helpers\ComponenteTipoHelper::isMultiplo($componente->tipo))
        @include('app.home.components.component'.$componente->tipo, ['componente' => $componente->elementos])
    @else
        @include('app.home.components.component'.$componente->tipo, ['componente' => $componente->elementos[0]])
    @endif
    @endforeach
@endsection

