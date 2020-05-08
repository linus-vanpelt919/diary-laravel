<?php

namespace App\Http\Controllers;

use App\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryDeleteController extends Controller
{
    public function delete(Request $request,$id){
        if(!ctype_digit($id)){//数字かどうか
            return redirect('/diaryListPage')->with('err_msg', __('Invalid operation was performed.'));
        }
        $diary = Auth::user()->diary()->find($id)->delete();
        return redirect('/diaryListPage')->with('suc_msg',__('Delete!!'));
    }
}
