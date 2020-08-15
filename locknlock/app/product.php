<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'table_product';

    protected $primaryKey = 'id_product';

    protected $fillable = ['cat2_id', 'cat1_id', 'ten_product', 'gia', 'masp', 'photo', 'chitietsanpham', 'thongtinsanpham', 'SP_Best', 'online'];

    public function cate2(){
    	return $this->belongsTo('App\category_2','cat2_id','id_product');
    }
}
