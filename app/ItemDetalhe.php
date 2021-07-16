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

    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function produto(): BelongsTo
    {
        return $this->belongsTo('App\Item', 'produto_id', '');
    }
}
