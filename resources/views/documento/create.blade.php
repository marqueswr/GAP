


@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
<div class="card">
    <div class="card-body">
        <h5 class="card-title" style="color:rgb(12, 43, 197)">INSERIR NOVO DOCUMENTO</h5></br>
      <h6 class="card-subtitle mb-2 text-muted">
      <p class="card-text">
        <div>
            <form method="POST" action="{{ route('documento.store')}}">
                @csrf
                <x-alert/>
                <input class="form-control" type="text" name="descricao" id="descricao" value="{{ old('descricao') }}" placeholder="informe o tipo de documento">
            </br>
                <button type="submit" class="btn btn-primary">GRAVAR</button>
                <a class="btn btn-light" data-toggle="tooltip" data-placement="top" title="retornar para listagem" style="margin-left: 10px"  href="{{ route('documento.index') }}">
                    RETORNAR PARA LISTAGEM
                  </a>
            </form>
        </div>
      </p>

    </div>
  </div>
</div>

@endsection

