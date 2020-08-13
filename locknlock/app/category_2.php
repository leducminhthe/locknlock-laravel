<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_2 extends Model
{
    protected $table = 'table_category_2';

    protected $fillable = ['ten_cate2', 'cat1_id', 'tenkhongdau', 'cate'];

	protected $primaryKey = 'id_cate2';

	public function cate1(){
		return $this->belongsTo('App\category_1', 'cat1_id', 'id_cate2');
	}
}

