{{$slot}}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <label>
        <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    </label>
    <br>
    <label>
        <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    </label>
    <br>
    <label>
        <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    </label>
    <br>
    <label>
        <select name="motivo_contato" class="{{$classe}}">
            <option value="">Qual o motivo do contato?</option>
            @foreach($motivo_contatos as $key => $motivo_contato)
                <option
                    value="{{$motivo_contato->id}}" {{old('motivo_contato') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
            @endforeach
        </select>
    </label>
    <br>
    <label>
        <textarea name="mensagem"
                  class="{{$classe}}">{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}} </textarea>
    </label>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

<div style="position: absolute; top: 0; left: 0; width: 100%; background: red">
<pre>
    {{print_r($errors)}}
</pre>
</div>
