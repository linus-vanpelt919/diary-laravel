<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';//テーブル名を複数形にすると不要
    protected $fillable = ['category_name','service_group',];

    public function diary(){//idとcategory_idを結びつけたい
        return $this->hasMany('App\Diary');
    }//カテゴリーという部署の中に日記が存在する1対多
}
