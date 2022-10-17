<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome'];

    public function pedido()
    {
        return $this->hasMany(Pedido::class, 'cliente_id', 'id');
    }
}
