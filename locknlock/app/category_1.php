<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_1 extends Model
{
    protected $table = 'table_category_1';

    public function cate2(){
    	return $this->hasMany('App\category_2', 'cat1_id', 'id');
    }
}
