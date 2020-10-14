<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instance;

class Emprestimo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function instances(){
        return $this->belongsTo(Instance::class);
    }

    public function getDataEmprestimoAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataInicialAttribute($value) {
       $this->attributes['data_emprestimo'] = implode('-',array_reverse(explode('/',$value)));
    }

    public function getDataFinalAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataDevolucaoAttribute($value) {
       $this->attributes['data_devolucao'] = implode('-',array_reverse(explode('/',$value)));
    }
}
