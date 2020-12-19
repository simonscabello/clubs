<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $all)
 * @method static find($id)
 */
class Club extends Model
{
    protected $table = 'clubs';

    protected $fillable = ['name', 'id_state'];

    public function states(): BelongsTo
    {
        return $this->belongsTo('App\State');
    }
}
