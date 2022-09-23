<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'tb_category';
    protected $guarded = [];

    public function component()
    {
        return $this->hasMany(ComponentModel::class, 'id_category');
    }
}
