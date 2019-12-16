<?php

namespace App\Http\Controllers\Forum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class deleteF extends Controller
{
   public function show($id)
   {
       if(\Auth::check())
       {
         $post = \App\Thread::where('id',$id)->first();
         if($post->user_id == \Auth::id())
         {
            \App\ThreadComment::where('ThreadID',$id)->delete();
            \App\Thread::where('id',$id)->delete();
            $x = \App\MThread::where('id',$post->MThread_ID)->first();
            $x->SubThreadCount--;
            $x->save();
         }
       }
       return redirect('Forum');
   } 
}
