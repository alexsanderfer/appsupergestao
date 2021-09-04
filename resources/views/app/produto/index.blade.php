@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2"><p>Listagem de Produtos</p></div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Cadastrar um Novo Produto</a></li>
            </ul>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome do Produto</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>ID</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->fornecedor->nome}}</td>
                            <td>{{$produto->peso}} kgs</td>
                            <td>{{$produto->unidade_id}}</td>
                            <td>{{$produto->itemDetalhe->comprimento ?? ''}} cms</td>
                            <td>{{$produto->itemDetalhe->altura ?? ''}} cms</td>
                            <td>{{$produto->itemDetalhe->largura ?? ''}} cms</td>
                            <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                            <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" method="post"
                                      action="{{route('produto.destroy', ['produto' => $produto->id])}}">
                                @method('DELETE')
                                @csrf
                                <!-- <button type="submit">Excluir</button> -->
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                {{$produtos->appends($request)->links()}}
                Exibindo {{$produtos->count()}} Produtos de {{$produtos->total()}} (de {{$produtos->firstItem()}}
                a {{$produtos->lastItem()}})
            </div>
        </div>
    </div>
@endsection
