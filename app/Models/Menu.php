<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu.
 */
class Menu extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getElement()
    {
        return $this->hasMany('App\Models\MenuItem', 'menu');
    }
}
