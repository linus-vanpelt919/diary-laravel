<?php

namespace App\Http\Controllers;

use App\Category;
use App\Diary;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DiaryEditController extends Controller
{
    public function index($id){
        if(!ctype_digit($id)){//数字かどうか
            return redirect('/diaryListPage')->with('err_msg', __('Invalid operation was performed.'));
        }
        //$diary = Diary::find($id);//実務だとidを空かどうか判定しなくてはいけない
        $diary = Auth::user()->diary()->find($id);//上だと他の人のも編集できてしまうので
        $categorys = Category::all();//カテゴリーも持ってくる
        return View('diaryEdit',compact('diary','categorys'));
    }
    public function edit(StoreBlogPost $request, $id){//更新処理updateでもいい
        if(!ctype_digit($id)){//数字かどうか
            return redirect('/diaryListPage')->with('err_msg', __('Invalid operation was performed.'));
        }

        $diary = Diary::find($id);//findでとってきてそれを元に登録（更新）している
        $form = $request->all();//送信内容を取得
        if(isset($form['pic']))
        {//画像ファイルがあった場合
            $file = $request->pic;
            //拡張子付きでファイル名を取得
            $filenameWithExt = $file->getClientOriginalName();
            //ファイル名のみを取得
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //拡張子を取得
            $extension = $file->getClientOriginalExtension();
            //トークン
            $file_token = Str::random(32);
            //保存のファイル名を構築 ランダム変数を付属させることでファイル名を区別
//            $filenameToStore = "storage/uploads/". $filename . "_" . $file_token . "." . $extension;
            $filenameToStore = $filename . "_" . $file_token . "." . $extension;
            $form['pic'] = $filenameToStore;
            $path = $request->file('pic')->storeAs('uploads',$filenameToStore);
        }   //storeAs(保存先のディレクトリ名,DBに保存するファイル名)

        $diary->fill($form)->save();

        return redirect('/diaryListPage')->with('suc_msg',__('更新しました'));
    }

}
