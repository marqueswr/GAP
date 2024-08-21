<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;
    protected $table = 'arquivos';
    protected $fillable = ['aluno_id','documento_id','foto'];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function documento(){
        return $this->belongsTo(Documento::class);
    }

}
