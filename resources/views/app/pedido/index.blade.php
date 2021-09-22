@extends('app.layouts.basico')
@section('titulo', 'Pedidos')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2"><p>Listagem de Pedidos</p></div>
        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.create')}}">Cadastrar um Novo Pedido</a></li>
            </ul>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>ID do Pedido</th>
                        <th>Cliente</th>
                        <th>❌</th> <!-- Emoji excluir -->
                        <th>🛠</th> <!-- Emoji editar -->
                        <th>👁️</th><!-- Emoji visualizar -->
                        <th></th>
                        <!-- Se possível, usar o FontAwesome para esses símbolos -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                            <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" method="post"
                                      action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                @method('DELETE')
                                @csrf
                                <!--<button type="submit">Excluir</button>-->
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id ]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                {{$pedidos->appends($request)->links()}}
                Exibindo {{$pedidos->count()}} Pedidos de {{$pedidos->total()}} ({{$pedidos->firstItem()}}
                a {{$pedidos->lastItem()}})
            </div>
        </div>
    </div>
@endsection
