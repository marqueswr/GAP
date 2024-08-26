<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Documento;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentoRequest;

class DocumentoController extends Controller
{

    public function index(Request $request)
    {
        $documentos = Documento::when ($request->has('parametro'), function($whenQuery) use ($request){
            $whenQuery->where('descricao', 'like','%' . $request->parametro . '%');
        })
        ->orderBy('descricao')->paginate(15);

        return view('documento.index', [
            'documentos'=> $documentos,
            'parametro'=> $request->parametro,
        ]);
    }


    public function create()
    {
        return view('documento.create');
    }


    public function store(DocumentoRequest $request)
    {
        $request->validated();

       try
        {
            Documento::create($request->all());
            return redirect()->route('documento.create')->with('success','Tipo de documento cadastrado com sucesso');
        }
        catch (Exception $e)
        {
            return redirect()->route('documento.create')->with('error','Ocorreram erros, nada foi cadastrado');
        }

    }


    public function show(Documento $documento)
    {

    }


    public function edit(Documento $documento)
    {
        return view('documento.edit', ['documento' => $documento]);
    }


    public function update(DocumentoRequest $request, Documento $documento)
    {
        $request->validated();

        try {
            $documento->update([
                'descricao' => $request->descricao
            ]);
            return redirect()->route('documento.index')->with('success', 'O documento foi alterado para ' . $request->descricao . ' com sucesso !!!');


        } catch (Exception $e) {
            return back()->withInput()->with('error', 'O documento não foi alterado');
        }
    }

    public function destroy(Documento $documento)
    {
        Documento::findOrFail($documento->id)->delete();
        return redirect()-> route('documento.index')-> with('success', 'Documento foi excluído com sucesso');
    }
}
