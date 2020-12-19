<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static find($id)
 */
class Club extends Model
{
    protected $table = 'clubs';

    protected $fillable = ['name', 'id_state'];

    public function states()
    {
        $this->belongsTo('App\State');
    }
}
