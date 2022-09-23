<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserComponentModel extends Model
{
    protected $table = 'tb_users_component';
    protected $guarded = [];

    public function categorycomponent()
    {
        return $this->belongsTo(CategoryComponentModel::class, 'id_component');
    }
}
