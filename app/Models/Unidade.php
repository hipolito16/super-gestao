<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['unidade', 'descricao'];

    public function produto() {
        return $this->hasMany(Produto::class, 'unidade_id', 'id');
    }
}
