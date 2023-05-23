@extends('sistema.layout')
@selection('title', 'Sistema Tarefas - Pesquisa tarefa')
@selection('content')
    <div class="card border">
        <div class="card-body">
            <form action="{{route('procurarTarefa')}}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="descricaoTarefa">Descrição da tarefa</label>
                    <input type="text" class="form-control" name="descricaoTarefa" id="descricaoTarefa" placeholder="Informe a descrição para a tarefa">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
        <button onclick="window.location.href='{{route('tarefasPendentes'}}';" type="button" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
                </div>
        </div>
@endselection
