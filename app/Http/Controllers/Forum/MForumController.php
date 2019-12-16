<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
use Schema;
class MForumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show()
    {
        $user = \Auth::user();
        $threads = \App\MThread::all();
       return view('forum', compact('user','threads'));
    }
}
