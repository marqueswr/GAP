<?php

namespace App\Http\Controllers;

use App\Models\Aluno;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{


   public function GeraPdf(

){
    $alunos = Aluno::all();
    $pdf = Pdf::loadView('pdf',compact('alunos'));
    return $pdf->stream('teste');
}
}
