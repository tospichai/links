<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentModel extends Model
{
    protected $table = 'tb_component';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'id_category');
    }

}
