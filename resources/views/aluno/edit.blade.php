
@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
<div class="card">
    <div class="card-body">
        <h5 class="card-title" style="color:rgb(12, 43, 197)">ALTERAR DADOS DA PESSOA</h5></br>
      <h6 class="card-subtitle mb-2 text-muted">
      <p class="card-text">
        <div>
            <form action="{{ route('aluno.update',['aluno' => $aluno->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-alert/>
<div class="row">

</div>
<br>
                <div class="row">
                    <div class="col-md-2" style=" text-align: center;">
                        <img src="{{asset('storage/'.$aluno->foto) }}" style="width:120px;height=120;border-radius:100%;border: 1px dotted gray;padding:2px;border-width: 2px;">
                   </br>
                    </div>
                    <div class="col-md-5">
                        <p>
                        <input class="form-control" type="text"
                        name="codigo" id="codigo" value="{{ old('codigo', $aluno->codigo) }}" >
                        </p>
                        <p>
                        <input class="form-control" type="text"
                        name="nome" id="nome" value="{{ old('nome', $aluno->nome) }}" >
                        </p>
                        <input class="form-control" type="email"
                        name="email" id="email" value="{{ old('email', $aluno->email) }}" >
                        <p>
                        <input class="form-control" type="text"
                        name="celular" id="celular" value="{{ old('celular', $aluno->celular) }}" >
                        </p>
                        <p>
                        <input class="form-control" type="date"
                        name="nascimento" id="nascimento" value="{{ old('nascimento', $aluno->nascimento) }}" >
                        </p>
                        <p>
                        <input class="form-control" type="file"
                        name="foto" id="foto" value="{{ old('foto', $aluno->foto) }}" >
                        </p>
                   </br>
                   <p>
                    <button type="submit" class="btn btn-primary">GRAVAR</button>
                    <a class="btn btn-light" data-toggle="tooltip" data-placement="top" title="retornar para listagem" style="margin-left: 10px"  href="{{ route('aluno.index') }}">
                        RETORNAR PARA LISTAGEM
                      </a>
                   </p>
                    </div>
                    <div class="col-md-5">

                   </br>
                    </div>
                </div>
    </form>
      </p>

@endsection

