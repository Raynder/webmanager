<?php

namespace App\Http\Controllers;

use App\Helpers\ComponenteTipoHelper;
use App\Models\Componente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ComponentesController extends Controller
{
    public function index()
    {
        $componentes = Componente::all();
        return view('admin.componentes.index', compact('componentes'));
    }

    public function create()
    {
        return view('admin.componentes.create');
    }

    public function edit($id)
    {
        $resul = Componente::query()
            ->leftJoin('elementos_componente', 'componentes.id', '=', 'elementos_componente.id_componente')
            ->where('componentes.id', $id)
            ->select('componentes.*', 'elementos_componente.elementos', 'elementos_componente.id as id_elemento')
            ->get();
        $componente = $resul[0];

        if ($componente->elementos != null) {
            $elementos = new stdClass();
    
            foreach ($resul as $elem) {
                $elementos->{$elem->id_elemento} = json_decode($elem->elementos);
                $elementos->{$elem->id_elemento}->id_elemento = $elem->id_elemento;
            }

            $componente->elementos = $elementos;
        }

        return view('admin.componentes.create', compact('componente'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->only('nome', 'tipo', 'titulo');
        $elementos = $request->except('_token', '_method', 'nome', 'tipo', 'titulo');

        $input = array_filter($input, function($value) {
            return $value != null;
        });
        $elementos = array_filter($elementos, function($value) {
            return $value != null;
        });

        if(ComponenteTipoHelper::isMultiplo($input['tipo'])) {
            unset($elementos['img_antiga']);
        }

        if(isset($elementos['img'])) {
            if(isset($elementos['img_antiga'])) {
                unlink($elementos['img_antiga']);
                unset($elementos['img_antiga']);
            }
        }
        else{
            $elementos['img'] = isset($elementos['img_antiga']) ? $elementos['img_antiga'] : '';
            unset($elementos['img_antiga']);
        }
        
        $componente = Componente::find($id);
        $componente->nome = isset($input['nome']) ? $input['nome'] : $componente->nome;
        $componente->tipo = isset($input['tipo']) ? $input['tipo'] : $componente->tipo;
        $componente->titulo = isset($input['titulo']) ? $input['titulo'] : $componente->titulo;

        if($componente->save()){
            $elemento = json_encode($elementos);
            if(ComponenteTipoHelper::isMultiplo($componente->tipo)){
                DB::table('elementos_componente')
                    ->insert([
                        'id_componente' => $elementos['id'],
                        'elementos' => $elemento
                    ]);
            }
            else{
                // DB update or create
                DB::table('elementos_componente')
                    ->updateOrInsert(
                        ['id_componente' => $componente->id],
                        ['elementos' => $elemento]
                    );
            }
        }
        return 'Componente atualizado com sucesso!';
    }

    public function store(Request $request)
    {
        $input = $request->only('nome', 'tipo', 'titulo');
        $elementos = $request->except('_token', '_method', 'nome', 'tipo', 'titulo');
        
        $input = array_filter($input, function($value) {
            return $value != null;
        });
        $elementos = array_filter($elementos, function($value) {
            return $value != null;
        });
        // dd($input, $elementos);
        
        $componente = new Componente();
        $componente->nome = $input['nome'];
        $componente->tipo = $input['tipo'];
        $componente->titulo = $input['titulo'];

        if($componente->save()){
            $elemento = json_encode($elementos);
            DB::table('elementos_componente')
                ->insert([
                    'id_componente' => $componente->id,
                    'elementos' => $elemento
                ]);
            return 'Componente criado com sucesso!';
        }
        return 'Erro ao criar componente!';
    }

    public function destroy($id)
    {
        if(DB::table('pagina_componentes')->where('id', $id)->delete()){
            return 'Componente excluído com sucesso!';
        }
    }

    public function addAll(Request $request)
    {
        $componentes = $request->componentes_id;
        $pagina_id = $request->pagina_id;
        $grupo = $request->tipo;
        $array = [];
        $contador = 0;

        foreach($componentes as $id){
            array_push($array, [
                'pagina_id' => $pagina_id,
                'componente_id' => $id,
                'ordem' => $contador,
                'grupo' => $grupo
            ]);
            $contador++;
        }

        DB::table('pagina_componentes')->where('pagina_id', $pagina_id)->where('grupo', $grupo)->delete();
        if(DB::table('pagina_componentes')->insert($array)){
            return response()->json('Componentes adicionados com sucesso!', 200);
        }
        return response()->json('Erro ao adicionar componentes!', 500);
    }

    public function removeElemento(Request $request)
    {
        $id = $request->id;
        $elemento = DB::table('elementos_componente')->where('id', $id)->first();
        $elementos = json_decode($elemento->elementos);

        if(isset($elementos->img)){
            if(true){
                DB::table('elementos_componente')->where('id', $id)->delete();
                return response()->json("Elemento excluído com sucesso!", 200);
            }
        }
        else{
            DB::table('elementos_componente')->where('id', $id)->delete();
            return response()->json("Elemento sem imagem excluído com sucesso!", 200);
        }
        return response()->json("Erro ao excluir elemento!", 500);
    }
}
