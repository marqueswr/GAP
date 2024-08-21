<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'documentos';
    protected $fillable = ['descricao'];

    public function arquivos(){
        return $this->hasMany(Arquivo::class);
    }

}
