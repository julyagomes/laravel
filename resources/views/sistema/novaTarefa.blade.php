@extends('sistema.layout')
@section('title', 'Sistema Tarefa - nova tarefa')
@section('content')
        <div class="card border">
            <div class="card-bord">
                <form action="{{route('gravaNovaTarefa')}}"method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="descricaoTarefa">Descrição da tarefa</label>
                        <input type="text" class="form-control" name="descricaoTarefa"
                            id="descricaoTarefa" placeholder="Informe a descrição para tarefa">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Selecione o tipo da tarefa</label>
                        <select class="form-control" name="tipo" id="tipo" required>
                            @foreach ($tipos as item)
                                <potion value="{{$item->id}}">{{$item->descricaoTipo}}</option>
                            @endforeach
                        </select>
                    </div>
            <div class="form-group">
                <label for="selectStatus">Selecione o status da tarefa</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="S">
                    <label class="form-check-label" for="status">Concluída</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="N" checked>
                    <label class="form-check-label" for="status">Pendente</label>
                </div>
            </div>
        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        <button onclick="window.location.href='{{route('tarefasPendentes')}}';" type="button" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection