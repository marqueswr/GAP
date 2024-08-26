
@extends('layouts.master-acervo')

@section('content')
</br>
<div class="row">
<div class="card">
    <div class="card-body">
        <h5 class="card-title" style="color:rgb(12, 43, 197)">DOCUMENTO VISUALIZADO</h5></br>
      <h6 class="card-subtitle mb-2 text-muted">
      <p class="card-text">
        <div>
                <div class="col-md-4 form-group">

                    <img src="/storage/{{ $arquivoEncontrado->foto }}">

                </div>

            <br><br><br>

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

