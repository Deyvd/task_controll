@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$tarefa->tarefa}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <fieldset disable>                        
                        <div class="mb-3">
                            <label class="form-label">Data limite conclusão</label>
                            <input type="date" class="form-control" Value="{{$tarefa->data_limite_conclusao}}" >
                        </div>                        
                        <a href="{{ url()->previous()}}" class="btn btn-primary">Voltar</a>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
