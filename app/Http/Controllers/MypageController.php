<?php

namespace App\Http\Controllers;

use App\Category;
use App\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage(Request $request){
        $categorys = Category::all();
        //$diarys = Auth::user()->diary()->paginate('6');

        $diarys = Diary::query();
        $diarys->where('user_id',Auth::user()->id);
        $order = $request->order;
        $cate = $request->category;
        if($cate){
            $diarys = $diarys->where('category_id',$cate);
        }
        if($order){
            $diarys = $diarys->orderBy('created_at',$order);
        }
        $diarys = $diarys->paginate('6');

        return View('mypage',compact('diarys','categorys'));
    }
}
