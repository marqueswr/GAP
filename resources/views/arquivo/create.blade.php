
@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
<div class="card">
    <div class="card-body">
        <h5 class="card-title" style="color:rgb(12, 43, 197)">INSERIR NOVA IMAGEM</h5></br>
      <h6 class="card-subtitle mb-2 text-muted">
      <p class="card-text">
        <div>
                {{-- campo para pesquisar pessoa --}}
                <div class="row">
                    <p>
                    <div class="navbar-search-block">
                        <form class="form-inline" action="{{ route('arquivo.create', ['parametro' => $parametro]) }}">
                          <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" id="parametro" data-toggle="tooltip" data-placement="top" title="pressione o botão ou ENTER para pesquisar"  name="parametro" placeholder="digite algo para pesquisar ou deixe em branco para mostrar tudo" value="{{ $parametro }}" >
                            <div class="input-group-append">
                              <button class="btn btn-success" style="margin-left: 10px" type="submit" data-toggle="tooltip" data-placement="top" title="pesquisar palavra informada">
                                <i class="fa fa-search"></i>
                              </button>

                            </div>
                          </div>
                        </form>
                      </div>
                </div>
            </p>
                {{-- inicio do formulário --}}
                <div class="row">
                    <div class="col-md-3 form-group">
                     <form method="POST" action="{{ route('arquivo.store')}}" enctype="multipart/form-data">
                     @csrf
                     <x-alert/>
				    <select  name="documento_id" id="documento_id" class="form-control" required>
					<option value="">-- Selecione o tipo de documento --</option>
					@foreach ($documentos as $item)
					<option value="{{ $item->id }}">
						{{ $item->descricao }}
					</option>
					@endforeach
				</select>
			    </div>
                <br><br>

                <div class="col-md-5 form-group">

				    <select  name="aluno_id" id="aluno_id" class="form-control" required>
					<option value="">-- Selecione a pessoa --</option>
					@foreach ($alunos as $item)
					<option value="{{ $item->id }}">
						{{ $item->codigo }} - {{ $item->nome }}
					</option>
					@endforeach
				</select>
			    </div>
                <br><br>
                <div class="col-md-4 form-group">
                <input class="form-control" type="file"
                name="foto" id="foto" value="foto"  >
                </div>
            <br><br><br>

            <div class="row">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" id="observacao" data-toggle="tooltip" data-placement="top" title="alguma classificação para o documento"  name="observacao" placeholder="observação para o documento que será inserido" >
                </div>
                </div>
              </div>
              <br><br><br>
                <button type="submit" class="btn btn-primary">GRAVAR</button>
                <a class="btn btn-light" data-toggle="tooltip" data-placement="top" title="retornar para listagem" style="margin-left: 10px"  href="{{ route('arquivo.index') }}">
                    RETORNAR PARA LISTAGEM
                  </a>

        </div>
    </form>
      </p>

    </div>
  </div>
</div>

@endsection

