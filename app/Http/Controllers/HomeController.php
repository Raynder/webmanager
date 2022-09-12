<?php

namespace App\Http\Controllers;

use App\Helpers\PegarPaginaHelper;
use App\Models\Pagina;
use stdClass;

class HomeController extends Controller
{
    public function index()
    {
        $paginas = Pagina::all();
        $nomePag = PegarPaginaHelper::pegarPagina();

        $componentesPagina = Pagina::query()
            ->join('pagina_componentes', 'pagina_componentes.pagina_id', '=', 'paginas.id')
            ->join('componentes', 'componentes.id', '=', 'pagina_componentes.componente_id')
            ->join('elementos_componente', 'elementos_componente.id_componente', '=', 'componentes.id')
            ->where('paginas.nome', $nomePag)
            ->get()
            ->orderBy('pagina_componentes.grupo', 'asc')
            ->orderBy('pagina_componentes.ordem', 'asc');

        
        foreach ($componentesPagina as $componente) {
            if ($componente->elementos != null) {
                $elementos = new stdClass();
                foreach (json_decode($componente->elementos) as $elem) {
                    $elementos->{$elem->id_elemento} = $elem;
                    $elementos->{$elem->id_elemento}->id_elemento = $elem->id_elemento;
                }
                $componente->elementos = $elementos;
            }
        }

        dd($componentesPagina);

        return view('app.home.index', compact('paginas', 'componentesPagina'));
    }

    public function pagina()
    {
        $paginas = Pagina::all();
        $nomePag = PegarPaginaHelper::pegarPagina();

        $componentesPagina = Pagina::query()
            ->join('pagina_componentes', 'pagina_componentes.pagina_id', '=', 'paginas.id')
            ->join('componentes', 'componentes.id', '=', 'pagina_componentes.componente_id')
            ->join('elementos_componente', 'elementos_componente.id_componente', '=', 'componentes.id')
            ->select('componentes.nome', 'componentes.tipo', 'componentes.titulo','componentes.id as componente_id','elementos_componente.elementos', 'elementos_componente.id', 'elementos_componente.id_componente','pagina_componentes.grupo', 'pagina_componentes.ordem', 'pagina_componentes.id as id_pagina_componente', 'paginas.id as pagina_id')
            ->where('paginas.nome', $nomePag)
            ->orderBy('pagina_componentes.grupo', 'asc')
            ->orderBy('pagina_componentes.ordem', 'asc')
            ->get();

        for($i = 0; $i < count($componentesPagina); $i++) {
            if ($componentesPagina[$i]->elementos != null) {
                $elementos = new stdClass();
                foreach (json_decode($componentesPagina[$i]->elementos) as $key => $elem) {
                    $elementos->{$key} = $elem;
                }
                $elementos->titulo = $componentesPagina[$i]->titulo;
                $componentesPagina[$i]->elementos = $elementos;
            }
        }

        
        $todosElementos = $componentesPagina->groupBy('id_pagina_componente')->map(function ($item, $key) {
            $item->elementos = $item->map(function ($item, $key) {
                return $item->elementos;
            });
            return $item;
        });

        foreach ($todosElementos as $key => $value) {
            $todosElementos[$key][0]->elementos = $todosElementos[$key]->elementos;
        }
        foreach ($todosElementos as $key => $value) {
            unset($todosElementos[$key]->elementos);
        }
        foreach ($todosElementos as $key => $value) {
            $todosElementos[$key] = $value[0];
        }
        
        $componentesPagina = $todosElementos;

        return view('app.home.index', compact('componentesPagina', 'paginas'));
    }

    
}
