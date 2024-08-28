@extends('layouts.master-acervo')

@section('content')
    <h1 style="color:red">Hello, world!</h1>
    <div>
        @foreach($alunos as $aluno)
        <div class="row">
            <div class="col-md-4">
                <img src="storage/{{ $aluno->foto }}" style="width:170px;height=170;">
            </div>
                <div class="col-md-8">
                    {{ $aluno->nome }} - {{ $aluno->email }}
                </div>
        </div>
        @endforeach

@endsection


