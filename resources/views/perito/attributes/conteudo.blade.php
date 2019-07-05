<div class="form-group">
    <label>Conteúdo</label>
    @if($acao == 'cadastrar')
        <select class="form-control" name="conteudo">
            @foreach (['Balins de Chumbo', 'Espoletas', 'Pólvora'] as $conteudo)
                <option value="{{ mb_strtolower($conteudo) }}">{{ $conteudo }}</option>
            @endforeach
        </select>
    @endif
    @if($acao == 'atualizar')
        <select class="form-control" name="conteudo">
            <option value="{{ mb_strtolower($conteudo) }}">{{ ucfirst ($conteudo) }}
                {{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
            </option>
            @foreach (['Balins de Chumbo', 'Espoletas', 'Pólvora'] as $conteudo2)
                @if ($conteudo<>mb_strtolower($conteudo2))
                    <option value="{{ mb_strtolower($conteudo2) }}">{{ $conteudo2 }}
                    </option>
                @endif
            @endforeach
        </select>
    @endif
</div>
