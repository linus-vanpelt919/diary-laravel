<?php

namespace App\Http\Controllers;

use App\Diary;
use Illuminate\Http\Request;

class DiarySortController extends Controller
{
    public function show(Request $request){
        $diarys = Diary::paginate('6');

        switch($request->sort){
            case 'desc'://降順
                $diarys->orderBy('created_at','desc');
                break;
                case 'asc'://昇順
                $diarys->orderBy('created_at','asc');
                break;
            default:
                $diarys->orderBy('created_at','desc');
                break;
        }
        //$diarys = Diary::paginate('6');
        return View('diaryListPage',['diarys'=>$diarys])
            ->with('sortBy', $request->sort);
    }

}
