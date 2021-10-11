<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function children()
    {
        return $this->hasMany(Family::class, 'family_id', 'id')->orderBy('name', 'asc');
    }
}
