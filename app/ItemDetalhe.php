<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ItemDetalhe
 * @package App
 */
class ItemDetalhe extends Model
{
    use HasFactory;
    /* Relação entre Item e ItemDetalhes através do belongsTo, fazendo referência a foreignKey
    * A classe está mapeando suas respectivas tabelas relacionais. */

    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item(): BelongsTo
    {
        return $this->belongsTo('App\Item', 'produto_id');
    }
}
