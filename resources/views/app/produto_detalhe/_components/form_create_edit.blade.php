@if(isset($produto_detalhe->id))
    <form method="post" action="{{route('produto-detalhe.update', ['produto_detalhe'=>$produto_detalhe->id])}}">
        @csrf
        @method('PUT')
        @else
            <form method="post" action="{{route('produto-detalhe.store')}}">
                @csrf
                @endif
                <label>
                    <input type="text" name="produto_id" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}"
                           placeholder="ID do Produto" class="borda-preta">
                    {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
                </label>
                <label>
                    <input type="text" name="comprimento" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}"
                           placeholder="Comprimento do Produto" class="borda-preta">
                    {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}
                </label>
                <label>
                    <input type="text" name="largura" value="{{$produto_detalhe->largura ?? old('largura')}}" placeholder="Largura do Produto"
                           class="borda-preta">
                    {{$errors->has('largura') ? $errors->first('largura') : ''}}
                </label>
                <label>
                    <input type="text" name="altura" value="{{$produto_detalhe->altura ?? old('altura')}}" placeholder="Altura do Produto"
                           class="borda-preta">
                    {{$errors->has('altura') ? $errors->first('altura') : ''}}
                </label>
                <label>
                    <select name="unidade_id">
                        <option>— Selecione a Unidade de Medida —</option>
                        @foreach($unidades as $unidade)
                            <option
                                value="{{$unidade->id}}"{{($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                        @endforeach
                        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
                    </select>
                </label>
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
    </form>
<!-- End of Form ->
