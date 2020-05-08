<?php

namespace App\Http\Controllers;
use App\Category;
use App\Diary;
use Illuminate\Http\Request;

class DiaryListPageController extends Controller
{

    public function index(Request $request){
        $categorys = Category::all();
        $diarys = Diary::query();
        $order = $request->order;
        $cate = $request->category;
        if($cate){
            $diarys = $diarys->where('category_id',$cate);
        }
        if($order){
            $diarys = $diarys->orderBy('created_at',$order);
        }
        $diarys = $diarys->paginate('6');
        return View('diaryListPage',['diarys'=>$diarys,'categorys'=>$categorys]);

    }
}
