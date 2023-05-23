<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Tarefa;
use Illuminate\Support\Facades\DB;

class controladorTarefa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $tarefas;
    private $total = 5;
    public function __construct(Tarefa $tarefa)
    {
        $this->middleware('auth');
        $this->tarefas = $tarefa;
    }
    public function listarTarefasPendentes()
    {
        $dados = $this->tarefas->with('tipo')->where('status', '=', 'N')->paginate($this->total);
        return view('sistema.tarefas', compact('dados'));
    }
    public function listarTarefasConcluidas()
    {
        $dados = $this->tarefas->with('tipo')->where('status', '=', 'S')->paginate($this->total);
        return view('sistema.tarefas', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('sistema.novaTarefa', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Tarefa();
        $dados->descricaoTarefa = $request->input('descricaoTarefa');
        $dados->status = $request->input('status');
        $dados->tipo_id = $request->input('tipo');
        $dados->save();
        return redirect('\tarefasPendentes')->with('success', 'Nova tarefa cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = Tarefa::find($id);
        if(isset($dados)){
            $tipos = Tipo::all();
            $dados->tipos = $tipos;
            return view('sistema.editarTarefa', compact('dados'));
        }
        return redirect('\tarefasPendentes')->with('danger', 'Traefa não encontrada.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Tarefa::find($id);
        if(isset($dados)){
            $dados = new Tarefa();
            $dados->descricaoTarefa = $request->input('descricaoTarefa');
            $dados->status = $request->input('status');
            $dados->tipo_id = $request->input('tipo');
            $dados->save();
        }else{
            return redirect('/tarefasPendentes')->with('danger', 'Erro ao tentar atualizar o cadastro. ');
        }
        return redirect('/tarefasPendentes')->with('success', 'Cadastro atualizado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Tarefa::find($id);
        if (isset($dados)){
            $dados->delete();
        }else{
            return redirect('/tarefasPendentes')->with('danger', 'Tarefa não encontrada. ');
        }
        return redirect('/tarefasPendentes')->with('success', 'Cadastro excluído com sucesso.');
        }

    public function pesquisarTarefa()
    {
        return view('sistema.pesquisarTarefa');
    }

    public function procurarTarefa(Request $request)
    {
        $descricao = $request->input('descricaoTarefa');
        $dados = DB::table('tarefas')->select('id', 'descricaoTarefa', 'status', 'tipo_id')
                                     ->where(DB::raw('lower(descricaoTarefa)'), 'like', '%'.
                                     strtolower($descricao).'%')->get();
        if(isset($dados)){
            foreach($dados as $item){
                $tipo = Tipo::find($item->tipo_id);
                $item->descricaoTipo = $tipo->descicaoTipo;
            }
            return view('sistema.exibirPesquisaTarefas', compact('dados'));
        }
        else 
            return redirect('/tarefasPendentes')
            ->with('danger', 'Não foram encontrados registros com o termo pesquisado.');
    }
    }

