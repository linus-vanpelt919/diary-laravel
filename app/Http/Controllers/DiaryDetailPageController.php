<?php

namespace App\Http\Controllers;

use App\Category;
use App\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiaryDetailPageController extends Controller
{
    public function index($id){
        if(!ctype_digit($id)){//数字かどうか
            return redirect('/diaryListPage')->with('err_msg', __('Invalid operation was performed.'));
        }
        $diary = Diary::find($id);//普通に日記情報を取得
        $category = $diary->category;//別々にやる?
        return view('diaryDetailPage',['diary'=>$diary,'category'=>$category]);
    }
}
