<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\VisibleScope;

/**
 * @method static create(array $all)
 * @method static find($id)
 */
class State extends Model
{
    protected $table = 'states';

    protected $fillable = ['state'];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope(new VisibleScope);
//    }

    public function clubs()
    {
        $this->hasMany('App\Club');
    }
}
