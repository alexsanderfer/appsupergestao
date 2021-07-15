@if(isset($produto->id))
    <form method="post" action="{{route('produto.update', ['produto'=>$produto->id])}}">
        @csrf
        @method('PUT')
        @else
            <form method="post" action="{{route('produto.store')}}">
                @csrf
                @endif
                <label>
                    <input type="text" name="nome" value="{{$produto->nome ?? old('nome')}}"
                           placeholder="Nome do Produto" class="borda-preta">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                </label>
                <label>
<textarea style="resize: none;" name="descricao" value="{{$produto->descricao ?? old('descricao')}}"
          placeholder="Descrição do Produto" class="borda-preta">
</textarea>
                    {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
                </label>
                <label>
                    <input type="text" name="peso" value="{{$produto->peso ?? old('peso')}}" placeholder="Peso"
                           class="borda-preta">
                    {{$errors->has('peso') ? $errors->first('peso') : ''}}
                </label>
                <label>
                    <select name="unidade_id">
                        <option>— Selecione a Unidade de Medida —</option>
                        @foreach($unidades as $unidade)
                            <option
                                value="{{$unidade->id}}"{{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                        @endforeach
                        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
                    </select>
                </label>
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
    </form>
