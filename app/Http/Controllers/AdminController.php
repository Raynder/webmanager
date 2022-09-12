<?php

namespace App\Http\Controllers;

use App\Helpers\RemoveAcentoHelper;
use App\Models\Componente;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $paginas = Pagina::all();
        return view('admin.home.index', compact('paginas'));
    }
    
    public function create()
    {
        return view('admin.home.create');
    }

    public function store(Request $request)
    {
        $pagina = new Pagina();
        $pagina->nome = RemoveAcentoHelper::removeAcentos($request->nome);
        if($pagina->save()){
            $this->atualizarRotas();
            return 'Pagina criada com sucesso';
        }
    }

    public function edit($id)
    {
        $pagina = Pagina::find($id);
        $componentes = Componente::all();
        $componentespg = Componente::query()
            ->join('pagina_componentes', 'pagina_componentes.componente_id', '=', 'componentes.id')
            ->where('pagina_componentes.pagina_id', $id)
            ->get();

        $elementos['cabecalho'] = $componentespg->where('grupo', 1);
        $elementos['corpo'] = $componentespg->where('grupo', 2);
        $elementos['rodape'] = $componentespg->where('grupo', 3);
        
        return view('admin.home.edit', compact('pagina', 'componentes', 'elementos'));
    }

    public function update(Request $request, $id)
    {
        $pagina = Pagina::find($id);
        $pagina->nome = RemoveAcentoHelper::removeAcentos($request->nome);
        if($pagina->save()){
            $this->atualizarRotas();
            return 'Pagina atualizada com sucesso';
        }
    }

    public function destroy($id)
    {
        $pagina = Pagina::find($id);
        if($pagina->delete()){
            $this->atualizarRotas();
            return redirect()->route('admin.index');
        }
    }

    public function atualizarRotas()
    {
        $paginas = Pagina::all();
        $txt = "<?php\n";

        foreach($paginas as $pagina){
            $txt .= "Route::get('/$pagina->nome/{id?}', [App\Http\Controllers\HomeController::class, 'pagina'])->name('$pagina->nome.index');\n";
        }

        $txt .= '?>';

        // sobrescrever arquivo rotas.php
        $arquivo = fopen(base_path('routes/rotas.php'), 'w');
        fwrite($arquivo, $txt);
        fclose($arquivo);
    }

    public function addComponente(Request $request)
    {
        $comp = $request->comp;
        $pagina = $request->pagina;

        DB::table('pagina_componentes')->insert([
            'pagina_id' => $pagina,
            'componente_id' => $comp
        ]);
        
        return 'ok';
    }
}
