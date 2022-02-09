@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                            <div class="col-6">
                            Tarefas 
                            </div>
                            
                            <div class="col-6">
                                <a class="float-right mr-3" href="{{route('tarefa.create')}}">Novo<a> 
                                <a class="float-right mr-3" href="{{route('tarefa.export', ['extensao' => 'xlsx'])}}">XLSX<a> 
                                <a class="float-right mr-3" href="{{route('tarefa.export', ['extensao' => 'csv'])}}">CSV<a> 
                                <a class="float-right mr-3" href="{{route('tarefa.export', ['extensao' => 'pdf'])}}">PDF<a> 
                                <a class="float-right mr-3" href="{{route('tarefa.exportPDF', ['extensao' => 'pdf'])}}" target="_blank">PDF V2 <a> 
                            </div>   
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data limite de Conclusão</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $tarefa )
                                
                            <tr>
                                <th scope="row">{{$tarefa->id}}</th>
                                <td>{{$tarefa->tarefa}}</td>
                                <td>{{date('d-m-Y', strtotime($tarefa->data_limite_conclusao))}}</td> 
                                <td>
                                    <a href="{{route('tarefa.edit', [$tarefa->id])}}">Editar</a>
                                <td>                           
                                <td>
                                    <form id="form_{{$tarefa->id}}" method="post" action="{{route('tarefa.destroy', ['tarefa'=>$tarefa->id])}}">
                                    @csrf
                                    @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$tarefa->id}}').submit()">Excluir</a>
                                    </form>
                                <td>                           
                            </tr>                            

                            @endforeach
                        </tbody>
                    </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{$tarefas->previousPageUrl()}}">Voltar</a></li>
                            @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                
                            <li class="page-item {{$tarefas->currentPage() == $i ? 'active' : ''}}">
                                <a class="page-link" href="{{$tarefas->url($i)}}">{{$i}}</a>
                            </li>
                            @endfor

                            <li class="page-item"><a class="page-link" href="{{$tarefas->nextPageUrl()}}">Avançar</a></li>
                        </ul>
                        </nav>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
