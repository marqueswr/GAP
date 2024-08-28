@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
    <div class="card">
    <div class="card-body">
      <h5 class="card-title" style="color:rgb(12, 43, 197)">LISTA DE IMAGENS CADASTRADAS</h5>

      <h6 class="card-subtitle mb-2 text-muted">

      </br>

      <div class="row">

        <div class="col-md-2">
            <form  action="{{ route('arquivo.index') }}">
<<<<<<< HEAD
            <input class="form-control" type="text" name="parametro" id="parametro" placeholder="informe o nome" data-toggle="tooltip" data-placement="top" title="parte do nome do aluno" >
=======
            <input class="form-control" type="text" name="parametro" id="parametro" placeholder="informe o nome" data-toggle="tooltip" data-placement="top" title="parte do nome da pessoa" >
>>>>>>> b2bbc5ecfcf23dd0582453122bad61a7a3c3ff75
        </div>

         <div class="col-md-2">
            <button class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="pesquisar" style="margin-left: 2px"  type="submit">Pesquisar</button>
        </form>
        </div>

        <div class="col-md-4">
            <form  action="{{ route('arquivo.index.filtrado') }}">
            <select  name="aluno_id" id="aluno_id" class="form-control">
<<<<<<< HEAD
                <option value="">-- Selecione o aluno --</option>
=======
                <option value="">-- Selecione a pessoa --</option>
>>>>>>> b2bbc5ecfcf23dd0582453122bad61a7a3c3ff75
                @foreach ($alunos as $item)
                <option value="{{ $item->id }}">
                   {{$item->nome}}
                </option>
                 @endforeach
            </select>
        </div>

        <div class="col-md-4">
                <button class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="pesquisar" style="margin-left: 2px" type="submit">Selecionar</button>
            </form>

         <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="inserir nova imagem de documento" style="margin-left: 2px"  href="{{ route('arquivo.create') }}">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>


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
                    @foreach ($arquivos as $item )
                    <tr>
                        {{-- <td style="width: 100px"><img src="storage/{{ $item->foto }}" style="width:70px;height=70;padding:2px;border-width: 2px;"></td> --}}
                        <td>{{ $item->id }} - {{ $item->nome }} / {{ $item->descricao}} - {{ $item->observacao}}</td>

                        <td class="float-right" style="margin-right: 0px">
                            <form id="formExcluir{{ $item->id }}" action="{{ route('arquivo.destroy',['arquivo'=> $item-> id]) }}" method="POST">
                             @csrf
                             @method('delete')
                                   <a  type="submit" onclick="confirmarExclusao(event, {{ $item->id }})" class="btn btn-outline-danger float-end ms-2 px-3" href="{{ route('arquivo.destroy',['arquivo'=>$item->id]) }}" > <i class="fa fa-trash"></i></a></td>
                              </form>
                            <x-alert/>
                     </td>
                     <td style="margin-right: 0px">

                     <a  class="btn btn-outline-primary " href="{{ route('arquivo.show',['arquivo'=> $item->id]) }}" ><i class="fa fa-eye"></i></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $arquivos->onEachSide(0)->links() }}
        </div>
      </p>

    </div>
  </div>
</div>

@endsection
