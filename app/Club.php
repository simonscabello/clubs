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

/*   protected $with = ['states']; /* sempre vai trazer os dados (tabelas relacionadas) quando carregar a model Club.
    pode ser ruim pois carrega muita informação e pode deixar devagar. */

    public function states(): BelongsTo
    {
        return $this->belongsTo('App\State', 'id_state');
    }
}
