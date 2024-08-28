
@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
<div class="card">
    <div class="card-body">
<<<<<<< HEAD
        <h5 class="card-title" style="color:rgb(12, 43, 197)">INSERIR NOVO FUNCIONÁRIO</h5></br>
=======
        <h5 class="card-title" style="color:rgb(12, 43, 197)">INSERIR NOVA PESSOA</h5></br>
>>>>>>> b2bbc5ecfcf23dd0582453122bad61a7a3c3ff75
      <h6 class="card-subtitle mb-2 text-muted">
      <p class="card-text">
        <div>
            <form method="POST" action="{{ route('aluno.store')}}" enctype="multipart/form-data">
                @csrf
                <x-alert/>

                <div class="row">
                    <div class="col-md-2">
                        <input class="form-control" type="text"
<<<<<<< HEAD
                        name="codigo" id="codigo" value="{{ old('codigo') }}" placeholder="informe o código" data-toggle="tooltip" data-placement="top" title="código do funciobnário" >
=======
                        name="codigo" id="codigo" value="{{ old('codigo') }}" placeholder="informe o código" data-toggle="tooltip" data-placement="top" title="código da pessoa" >
>>>>>>> b2bbc5ecfcf23dd0582453122bad61a7a3c3ff75
                   </br>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="text"
<<<<<<< HEAD
                        name="nome" id="nome" value="{{ old('nome') }}" placeholder="informe o nome" data-toggle="tooltip" data-placement="top" title="nome completo do funciobário" >
=======
                        name="nome" id="nome" value="{{ old('nome') }}" placeholder="informe o nome" data-toggle="tooltip" data-placement="top" title="nome do pessoa" >
>>>>>>> b2bbc5ecfcf23dd0582453122bad61a7a3c3ff75
                   </br>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="email"
<<<<<<< HEAD
                        name="email" id="email" value="{{ old('email') }}" placeholder="informe o email" data-toggle="tooltip" data-placement="top" title="email do funcionário" >
=======
                        name="email" id="email" value="{{ old('email') }}" placeholder="informe o email" data-toggle="tooltip" data-placement="top" title="email da pessoa" >
>>>>>>> b2bbc5ecfcf23dd0582453122bad61a7a3c3ff75
                   </br>
                    </div>
                </div>

       <div class="row">
        <div class="col-md-2">
            <input class="form-control" type="text"
<<<<<<< HEAD
            name="celular" id="celular" value="{{ old('celular') }}" placeholder="informe o celular" data-toggle="tooltip" data-placement="top" title="celular do funcionário" >
=======
            name="celular" id="celular" value="{{ old('celular') }}" placeholder="informe o celular" data-toggle="tooltip" data-placement="top" title="celular da pessoa" >
>>>>>>> b2bbc5ecfcf23dd0582453122bad61a7a3c3ff75
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

