<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Aluno;
use App\Models\Arquivo;
use App\Models\Documento;

use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{

    public function index(Aluno $request)
    {

        // $arquivos = Arquivo::when ($request->has('parametro'), function($whenQuery) use ($request){
        //     $whenQuery->where('nome', 'like','%' . $request->parametro . '%');
        // })
        // ->orderByDesc('nome')->paginate(10);

        // return view('arquivo.index', [
        //     'arquivos'=> $arquivos,
        //     'parametro'=> $request->parametro,
        // ]);

        $arquivos = Arquivo::all();
        return view('arquivo.index',compact('arquivos'));
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

        $documentos = Documento::all();

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
                     'foto' => $fotoURL]);

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


    public function show(Arquivo $arquivo)
    {

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
