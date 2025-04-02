<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convidados extends Model
{
    use HasFactory;
    protected $table="convidados";
    public $fillable = ['familia' , 'nome' , 'data_confirmacao' , 'telefone' , 'status'];

}
