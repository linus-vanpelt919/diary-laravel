<?php

namespace App\Http\Controllers;

use App\Category;
use App\Diary;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DiaryController extends Controller
{

    public function index(){//日記登録ページ
        //カテゴリーテーブルを持たせてあげる
        $categorys = Category::all();
        //$diary = null;
        return View('diary',['categorys'=>$categorys]);
    }
    public function create(StoreBlogPost $request){
//
        $diary = new Diary;
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
            //保存のファイル名を構築 日時を付属させることでファイル名を区別
            $filenameToStore = $filename . "_" . $file_token . "." . $extension;
            $form['pic'] = $filenameToStore;
            $path = $request->file('pic')->storeAs('uploads',$filenameToStore);
        }   //storeAs(保存先のディレクトリ名,DBに保存するファイル名)

        Auth::user()->diary()->save(
            $diary->fill($form)
        );

        return redirect('/diary')->with('suc_msg', __('登録しました'));
    }
}
