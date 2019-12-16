<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
use Schema;
class postFComment extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($id,Request $request)
    {
        if(\Auth::check() && $request->post('comment') != '' && strlen($request->post('comment')) < 2500)
        {
            $comment = new \App\ThreadComment;
            $comment->ThreadID = $id;
            $comment->userID = \Auth::id();
            $comment->userName = \Auth::user()->name;
            $comment->text = $request->post('comment');
            $comment->save();
        }
        return redirect('SubThread/'.$id);

    }
}
