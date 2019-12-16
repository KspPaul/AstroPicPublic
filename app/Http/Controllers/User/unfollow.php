<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class unfollow extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($id)
    {   
        if(\Auth::check())
        {
            $user = \App\Following::where('MID', \Auth::id())->where('FID',$id)->first();
            if($user!=null)\App\Following::where('MID', \Auth::id())->where('FID',$id)->delete();
        }
        return redirect('/user/'.$id);
    }
}
