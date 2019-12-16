<?php

namespace App\Http\Controllers\Forum;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
use Schema;
class SubThread extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($id)
    {
        $isSame = false;
        $post = \App\Thread::where('id',$id)->first();
        if($post == null)
        {
            return redirect('Forum');
        }
        $Puser = \App\User::where('id',$post->user_id)->first();
        $user = \Auth::user();
        if($user != null)
        {
            if($user->name == $Puser->name) $isSame = true;
        }
        $comments = \App\ThreadComment::where('ThreadID',$id)->orderBy('created_at', 'desc')->get();
        return view('SubThread', compact('user','post','comments','Puser','isSame'));
    }
}
