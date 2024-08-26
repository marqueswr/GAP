<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Aluno;
use App\Models\Arquivo;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ArquivoController extends Controller
{

    public function index(Request $request)
    {
        $parametro = $request->parametro;

        $alunos = Aluno::when ($request->has('parametro'), function($whenQuery) use ($request){
            $whenQuery->where('nome', 'like','%' . $request->parametro . '%');
        })
        ->orderBy('nome')->get();

        $arquivos = DB::table('arquivos')
        ->join('alunos', 'arquivos.aluno_id', '=', 'alunos.id')
        ->join('documentos', 'arquivos.documento_id', '=', 'documentos.id')
        ->select('arquivos.*','alunos.nome','documentos.descricao')
        ->paginate(10);

        return view('arquivo.index',compact('arquivos','alunos','parametro'));
    }

    public function filtrado(Request $request)
    {
        $parametro = $request->aluno_id;

        $arquivos = DB::table('arquivos')
        ->join('alunos', 'arquivos.aluno_id', '=', 'alunos.id')
        ->join('documentos', 'arquivos.documento_id', '=', 'documentos.id')
        ->select('arquivos.*','alunos.nome','documentos.descricao')
        ->where('arquivos.aluno_id','=',$request->aluno_id)
        ->paginate(10);

         $alunos = Aluno::all();

        return view('arquivo.index',compact('arquivos','alunos','parametro'));
    }


    public function create(Request $request)
    {
        if($request->parametro)
        {
            $alunos = Aluno::when ($request->has('parametro'), function($whenQuery) use ($request){
                $whenQuery->where('nome', 'like','%' . $request->parametro . '%');
            })
            ->orderBy('nome')->get();
        }
        else
        {
            $alunos = [];
        }

        $documentos = DB::table('documentos')
        ->orderBy('descricao')
        ->get();

        // $documentos = Documento::all();

        return view('arquivo.create',[
        'alunos'=>$alunos,
        'documentos'=>$documentos,
        'parametro'=>$request->parametro
       ]);
    }


    public function store(Request $request)
    {
         //checar se veio a imagem
         if($request->hasFile('foto'))
         {
             if($request->foto->isValid())
             {
             try
              {
                 $fotoURL = $request->foto->store("arquivos/$request->aluno_id",'public');

                 $arquivo = Arquivo::create([
                     'aluno_id' => $request->aluno_id,
                     'documento_id' => $request->documento_id,
                     'foto' => $fotoURL,
                     'observacao'=> $request->observacao]);

                  return redirect()->route('arquivo.index')->with('success','Imagem inserida no cadastro com sucesso');
              }
              catch (Exception $e)
              {
                  return redirect()->route('arquivo.create')->with('error','Ocorreram erros, a imagem não foi inserida');
              }
             }
             else
             {
                 return redirect()->route('arquivo.create')->with('error','Arquivo de imagem inváido');
             }
         }
         else
         {
             return redirect()->route('arquivo.create')->with('error','Sem imagem inserida');
         }


    }


    public function show($arquivo)
    {
        $arquivoEncontrado = Arquivo::find($arquivo);
        return view('arquivo.show', compact('arquivoEncontrado'));

    }


    public function edit(Arquivo $arquivo)
    {

    }


    public function update(Request $request, Arquivo $arquivo)
    {

    }


    public function destroy(Arquivo $arquivo)
    {
       $foto = Arquivo::find($arquivo->id);
       Storage::disk('public')->delete($arquivo->foto);

        Arquivo::findOrFail($arquivo->id)->delete();
        return redirect()-> route('arquivo.index')-> with('success', 'A imagem foi excluida com sucesso');
    }
}
