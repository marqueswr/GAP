<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $table = 'alunos';
    protected $fillable = ['codigo','nome','email','celular','nascimento','foto'];

    public function arquivos(){
        return $this->hasMany(Arquivo::class);
    }
}
