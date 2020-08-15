<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_1 extends Model
{
    protected $table = 'table_category_1';

    public function cate2(){
    	//cat1_id là khóa phụ của category_2 -> category_1
    	//id là khóa chính của category_1
    	return $this->hasMany('App\category_2', 'cat1_id', 'id');
    }

    public function product(){
    	//cat1_id là khóa phụ của category_2 -> category_1
    	//cat2_id là khóa phụ của product -> category_2
    	return $this->hasManyThrough('App\product', 'App\category_2', 'cat1_id', 'cat2_id', 'id');
    }
}
