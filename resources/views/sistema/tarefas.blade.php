@extends('sistema.layout')
@section('title', 'Sistema Tarefas - Tarefas')
@section('content')
    <div class="card border">
        @if(session()->get('danger'))
            <div class="alert alert-danger">
                {{session()->get('danger')}}
            </div><br />
        @elseif(session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
             </div><br />
        @endif 
        <div class="card-body">
            <h5 class="card-title" style="text-align: center">Cadastro de Tarefas</h5>
                <table class="table table-ordered table-hover" id="tabelaTipos">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição da Tarefa</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th style="text-align:center" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $item => $value)
                        <tr>
                            <td>{{$value['id'] }}</td>
                            <td>{{$value['descicaoTarefa'] }}</td>
                            @if($value['status'] == 'N')
                                <td>Pendente</td>
                            @else
                                <td>Concluída</td>
                            @endif
                            <td>{{$value['tipo']['descicaoTipo']}}</td>
                            <td style="text-align:center">
                                <a href="/tarefas/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                            </td>
                            <td style="text-align:center">
                                <a href="/tarefas/apagar/{{ $value['id'] }}" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- paginação --}}
                <div class="d-flex justify-content-center">
                    {!! $dados->links() !!}
                </div>
        </div>
        <div class="card-footer">
            <a href="/tarefas/novo" class="btn btn-primary btn-sm" role="button">Novo Cadastro</a>
        </div>
    </div>
@endsection
