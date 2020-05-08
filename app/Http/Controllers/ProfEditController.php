<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfEditController extends Controller
{
    public function index($id,User $user){//閲覧
        //$users = User::all();
        $user = Auth::user()->find($id);
        //自分以外表示不可にする $userのidをとってからpolicyを記述
        $this->authorize('view',$user);
        return view('profEdit',['user'=>$user]);
        //return view('profEdit',response()->json(['user'=>$user]));こう？
        //基本的に同じ変数名を使うのでcompact('users')でいい
    }

    public function edit(Request $request, $id)
    {//プロフィールをupdateしたい
        if(!ctype_digit($id)){
            return redirect('/home')->with('err_msg', __('Invalid operation was performed.'));
        }
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'tell'=>'nullable|numeric|digits_between:8,11',//数値 8~11
            'img'=>'nullable|image|file',
        ]);

        $user = User::find($id);//ユーザー情報を取得
        $form = $request->all();//送信内容を取得
        if(isset($form['img']))
        {//画像ファイルがあった場合
            $file = $request->img;
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
            $form['img'] = $filenameToStore;
            $path = $request->file('img')->storeAs('uploads',$filenameToStore);
        }   //storeAs(保存先のディレクトリ名,DBに保存するファイル名)

        $user->fill($form)->save();
        return redirect()->route('profEdit',['id'=>$user])->with('suc_msg',__('更新しました'));

    }
}

