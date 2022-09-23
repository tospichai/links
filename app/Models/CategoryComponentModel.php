<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryComponentModel extends Model
{
    protected $table = 'tb_category_component';
    protected $guarded = [];

    public function component()
    {
        return $this->belongsTo(ComponentModel::class, 'id_component');
    }

    public function usercomponent()
    {
        return $this->hasMany(UserComponentModel::class, 'id_category_component');
    }
}
