<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\VisibleScope;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $all)
 * @method static find($id)
 */
class State extends Model
{
    protected $table = 'states';

    protected $fillable = ['state'];

//    protected $with = ['clubs'];

    public function clubs(): HasMany
    {
        return $this->hasMany('App\Club', 'id_state');
    }
}
