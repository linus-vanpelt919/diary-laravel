<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'diary';//テーブル名を複数形にすると不要
    protected $fillable =['title','detail','pic','category_id'];

    public function user(){//DiaryモデルはUserモデルに属している
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
