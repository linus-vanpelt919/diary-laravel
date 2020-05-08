<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PracticeFormController extends Controller
{
    public function index(){
        $diarys = Auth::user()->diary;
        $diarys = json_encode($diarys);
        return View('practiceForm',compact('diarys'));
    }
}
