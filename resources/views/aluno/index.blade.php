@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
    <div class="card">
    <div class="card-body">
      <h5 class="card-title" style="color:rgb(12, 43, 197)">LISTA DE PESSOAS CADASTRADAS</h5>
      <h6 class="card-subtitle mb-2 text-muted">
      </br>
        <div class="navbar-search-block">
            <form class="form-inline" action="{{ route('aluno.index') }}">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" id="parametro" data-toggle="tooltip" data-placement="top" title="pressione o botão ou ENTER para pesquisar"  name="parametro" placeholder="digite algo para pesquisar ou deixe em branco para mostrar tudo" value="{{ $parametro }}" >
                <div class="input-group-append">
                  <button class="btn btn-success" style="margin-left: 10px" type="submit" data-toggle="tooltip" data-placement="top" title="pesquisar palavra informada">
                    <i class="fa fa-search"></i>
                  </button>
                  <a class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="inserir novo aluno" style="margin-left: 2px"  href="{{ route('aluno.create') }}">
                    +
                  </a>
                </div>
              </div>
            </form>
          </div>
      </h6>
      <p class="card-text">
        <div>
            <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="text-align:center;color:rgb(187, 10, 10)"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $item )
                    <tr>
                        <td><img src="storage/{{ $item->foto }}" style="width:50px;height=50;border-radius:100%;border: 1px dotted gray;padding:2px;border-width: 2px;"></td>
                        <td><b>{{ $item->id }}</b></td>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->celular }}</td>
                        <td>{{ $item->nascimento }}</td>
                        <td class="float-sm-right">

                            <form id="formExcluir{{ $item->id }}" action="{{ route('aluno.destroy',['aluno'=> $item-> id]) }}" method="POST">
                             @csrf
                             @method('delete')
                               <a  class="btn btn-outline-primary float-end ms-2 px-3" href="{{ route('aluno.edit',['aluno'=> $item->id]) }}" ><i class="fa fa-pencil"></i></a>
                               <a  type="submit" onclick="confirmarExclusao(event, {{ $item->id }})" class="btn btn-outline-danger float-end ms-2 px-3" href="{{ route('aluno.destroy',['aluno'=>$item->id]) }}" > <i class="fa fa-trash"></i></a></td>
                            </form>
                            <x-alert/>
                     </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $alunos->onEachSide(0)->links() }}
        </div>
      </p>

    </div>
  </div>
</div>

@endsection
