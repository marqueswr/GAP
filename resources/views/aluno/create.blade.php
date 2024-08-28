
@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
<div class="card">
    <div class="card-body">
        <h5 class="card-title" style="color:rgb(12, 43, 197)">INSERIR NOVA PESSOA</h5></br>
      <h6 class="card-subtitle mb-2 text-muted">
      <p class="card-text">
        <div>
            <form method="POST" action="{{ route('aluno.store')}}" enctype="multipart/form-data">
                @csrf
                <x-alert/>

                <div class="row">
                    <div class="col-md-2">
                        <input class="form-control" type="text"
                        name="codigo" id="codigo" value="{{ old('codigo') }}" placeholder="informe o código" data-toggle="tooltip" data-placement="top" title="código do funcionário" >   </br>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="text"
                        name="nome" id="nome" value="{{ old('nome') }}" placeholder="informe o nome" data-toggle="tooltip" data-placement="top" title="nome completo do funcionário" >

                   </br>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="email"
                        name="email" id="email" value="{{ old('email') }}" placeholder="informe o email" data-toggle="tooltip" data-placement="top" title="email do funcionário" >

                   </br>
                    </div>
                </div>

       <div class="row">
        <div class="col-md-2">
            <input class="form-control" type="text"

            name="celular" id="celular" value="{{ old('celular') }}" placeholder="informe o celular" data-toggle="tooltip" data-placement="top" title="celular do funcionário" >
          </br>
        </div>
        <div class="col-md-5">
            <input class="form-control" type="date"
            name="nascimento" id="nascimento" value="{{ old('nascimento') }}" placeholder="informe data de nascimento" data-toggle="tooltip" data-placement="top" title="data de nascimento" >
            </br>
        </div>
        <div class="col-md-5">
            <input class="form-control" type="file"
            name="foto" id="foto" value="foto"  >
            </br>
    </div>
       </div>
                <button type="submit" class="btn btn-primary">GRAVAR</button>
                <a class="btn btn-light" data-toggle="tooltip" data-placement="top" title="retornar para listagem" style="margin-left: 10px"  href="{{ route('aluno.index') }}">
                    RETORNAR PARA LISTAGEM
                  </a>

        </div>
    </form>
      </p>

    </div>
  </div>
</div>

@endsection

