<?php

namespace App\Http\Controllers\Forum;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
use Schema;
class SubForumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($id)
    {
        $user = \Auth::user();
        $thread = \App\MThread::where('id',$id)->first();
        
        $subThreads = \App\Thread::where('MThread_ID',$id)->orderBy('created_at', 'desc')->paginate(50);
        return view('SubForum',compact('subThreads','user', 'thread'));
    }
}
