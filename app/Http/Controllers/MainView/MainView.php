<?php

namespace App\Http\Controllers\MainView;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class MainView extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($var)
    {
        $user = \Auth::user();
        $id = \Auth::id();


        $following = \App\Following::where('MID', \Auth::id())->get();
        $arr = array();

        $count = 0;
        foreach ($following as $f) {
            array_push($arr,$f->FID);
        }
        $picture = null;
        if($following != null)
        {
            $picture = \App\picture::whereIn('user_ID', $arr)->orderBy('created_at', 'desc')->paginate(25);

        }
        return view('main', compact('picture','user'));

    }
}