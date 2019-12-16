<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
use Schema;
class postF extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show(Request $request)
    {
        if(\Auth::check())
        {
            $v = \App\VerifyMail::where('UID',\Auth::id())->first();

            if($v != null )return view('VerificationError',compact('user'));

            if(strlen($request->post('Text')) > 0)
            {
                $MThread = \App\MThread::where('name', $request->post('Thread'))->first();
                error_log($MThread->id.'Tst');
                
                $MThread->SubThreadCount++;
                $MThread->save();


                $Thread = new \App\Thread;
                $Thread->MThread_ID = $MThread->id;
                $Thread->user_id = \Auth::id();
                $Thread->Text = $request->post('Text');
                $Thread->Title = $request->post('name');
                $Thread->save();
            }
            else
            {
                return redirect('/Forum/post');
            }
        }
        return redirect('/Forum/'.$MThread->id);
    }
}