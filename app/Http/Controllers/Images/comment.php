<?php

namespace App\Http\Controllers\Images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class comment extends Controller
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

            $v = \App\VerifyMail::where('UID',\Auth::id())->first();   
            if($v != null )return view('VerificationError',compact('user'));

            $comment = new \App\comment;
            $comment->pictureName = $id;
            $comment->userID = \Auth::id();
            $comment->userName = \Auth::user()->name;
            $comment->comment = $request->post('comment');
            $comment->save();
        }
        return redirect('/image/'.\App\picture::where('id', '=', $id)->first()->imageNumber);

    }
}
