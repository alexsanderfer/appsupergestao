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

    protected $table= 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /**
     * @return HasOne
     */
    public function produtoDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }
}
