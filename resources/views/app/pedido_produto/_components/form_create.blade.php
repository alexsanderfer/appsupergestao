<form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
    @csrf
    <label>
        <select name="produto_id">
            <option>-- Selecione um Produto --</option>
            @foreach($produtos as $produto)
                <option
                    value="{{ $produto->id }}" {{old('cliente_id') == $produto->id ? 'selected' : ''}} >{{ $produto->nome }}</option>
            @endforeach
        </select>
    </label>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
