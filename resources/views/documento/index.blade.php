@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
    <div class="card">
    <div class="card-body">
      <h5 class="card-title" style="color:rgb(12, 43, 197)">LISTA DE DOCUMENTOS CADASTRADOS</h5>
      <h6 class="card-subtitle mb-2 text-muted">
      </br>
        <div class="navbar-search-block">
            <form class="form-inline" action="{{ route('documento.index') }}">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" id="parametro" data-toggle="tooltip" data-placement="top" title="pressione o botão ou ENTER para pesquisar"  name="parametro" placeholder="digite algo para pesquisar ou deixe em branco para mostrar tudo" value="{{ $parametro }}" >
                <div class="input-group-append">
                  <button class="btn btn-success" style="margin-left: 10px" type="submit" data-toggle="tooltip" data-placement="top" title="pesquisar palavra informada">
                    <i class="fa fa-search"></i>
                  </button>
                  <a class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="inserir novo documento" style="margin-left: 2px"  href="{{ route('documento.create') }}">
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
                  </tr>
                </thead>
                <tbody>
                    @foreach ($documentos as $item )
                    <tr>
                        <td style="width: 60px;color:rgb(247, 243, 243);text-align:center;background:rgb(5, 5, 5)"><b>{{ $item->id }}</b></td>
                        <td>{{ $item->descricao }}</td>
                        <td class="float-sm-right">

                            <form id="formExcluir{{ $item->id }}" action="{{ route('documento.destroy',['documento'=> $item-> id]) }}" method="POST">
                             @csrf
                             @method('delete')
                               <a  class="btn btn-outline-primary float-end ms-2 px-3" href="{{ route('documento.edit',['documento'=> $item->id]) }}" ><i class="fa fa-pencil"></i></a>
                               <a  type="submit" onclick="confirmarExclusao(event, {{ $item->id }})" class="btn btn-outline-danger float-end ms-2 px-3" href="{{ route('documento.destroy',['documento'=>$item->id]) }}" > <i class="fa fa-trash"></i></a></td>
                            </form>
                            <x-alert/>
                     </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $documentos->onEachSide(0)->links() }}
        </div>
      </p>

    </div>
  </div>
</div>

@endsection
