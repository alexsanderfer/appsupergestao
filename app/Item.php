<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Item
 * @package App
 */
class Item extends Model
{
    use HasFactory;
    /* Relação entre ItemDetalhes e Item através do hasOne, fazendo referência a foreignKey e localKey
    * A classe está mapeando suas respectivas tabelas relacionais. */
    protected $table= 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function itemDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }
}
