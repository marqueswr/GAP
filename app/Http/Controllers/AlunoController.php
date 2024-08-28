<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use Illuminate\Support\Facades\Storage;

class AlunoController extends Controller
{

    public function index(Request $request)
    {
        $alunos = Aluno::when ($request->has('parametro'), function($whenQuery) use ($request){
            $whenQuery->where('nome', 'like','%' . $request->parametro . '%');
        })
        ->orderBy('nome')->paginate(20);

        return view('aluno.index', [
            'alunos'=> $alunos,
            'parametro'=> $request->parametro,
        ]);
    }


    public function create()
    {
        return view('aluno.create');
    }


    public function store(AlunoRequest $request)
    {
        //checar se veio a imagem
        if($request->hasFile('foto'))
        {
            if($request->foto->isValid())
            {
                $request->validated();

            try
             {
                $fotoURL = $request->foto->store("alunos",'public');

                $aluno = Aluno::create([
                    'codigo' => $request->codigo,
                    'nome' => $request->nome,
                    'email' => $request->email,
                    'celular' => $request->celular,
                    'nascimento' => $request->nascimento,
                    'foto' => $fotoURL]);

                 return redirect()->route('aluno.create')->with('success','Funcionário cadastrado com sucesso');
             }
             catch (Exception $e)
             {
                 return redirect()->route('aluno.create')->with('error','Ocorreram erros, o funcionário não foi cadastrado');
             }
            }
            else
            {
                return redirect()->route('aluno.create')->with('error','Arquivo de foto inváido');
            }

        }
        else
        {
            return redirect()->route('aluno.create')->with('error','Sem foto inserida');
        }


    }


    public function show(Aluno $aluno)
    {

    }


    public function edit(Aluno $aluno)
    {
        return view('aluno.edit', ['aluno' => $aluno]);
    }


    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $request->validated();

        if($request->foto)
        {

           if(Storage::exists($aluno->foto))
            {
               Storage::delete($aluno->foto);
            }

            try {
                $fotoURL = $request->foto->store("alunos",'public');
                $aluno->update([
                    'codigo' => $request->codigo,
                    'nome' => $request->nome,
                    'email' => $request->email,
                    'celular' => $request->celular,
                    'nascimento' => $request->nascimento,
                    'foto' => $fotoURL]);

                return redirect()->route('aluno.index')->with('success', 'Os dados do funcionário foram alterados com sucesso !!!');


            } catch (Exception $e) {
                return back()->withInput()->with('error', 'Os dados do funcionário não foram alterados, inclusive a foto');
            }
        }
        else
        {
            try {

                $aluno->update([
                    'codigo' => $request->codigo,
                    'nome' => $request->nome,
                    'email' => $request->email,
                    'celular' => $request->celular,
                    'nascimento' => $request->nascimento]);

                return redirect()->route('aluno.index')->with('success', 'Os dados do funciobário foram alterados com sucesso !!!');


            } catch (Exception $e) {
                return back()->withInput()->with('error', 'Os dados do funcionário não foram alterados');
            }
        }

    }


    public function destroy(Aluno $aluno)
    {
        Aluno::findOrFail($aluno->id)->delete();
        return redirect()-> route('aluno.index')-> with('success', 'O funcionário foi excluído com sucesso');
    }
}
