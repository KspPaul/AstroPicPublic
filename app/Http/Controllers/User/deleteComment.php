<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class deleteComment extends Controller
{
    public function show($type, $id)
    {
        if(\Auth::check())
        {
            if($type == 'P')
            {
                $comment = \App\comment::where('id',$id)->first();
                if($comment->userID == \Auth::id())
                {
                    $redirectT = $comment->pictureName;
                    \App\comment::where('id',$id)->delete();
                    $image = \App\picture::where('id',$redirectT)->first();
                    return redirect('image/'.$image->imageNumber);
                }
            }
            if($type == 'F')
            {
                $comment = \App\ThreadComment::where('id',$id)->first();
                if($comment->userID == \Auth::id())
                {
                    $redirectT = $comment->ThreadID;
                    \App\ThreadComment::where('id',$id)->delete();
                    return redirect('SubThread/'.$redirectT);
                }
            }
        }
        return redirect('');
    }
}
