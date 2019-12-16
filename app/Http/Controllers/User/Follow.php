<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class Follow extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * ID is the id of the to follow User
     */
    public function show($id)
    {
        if(\Auth::check())
        {
            $user =   $user = \App\User::where('id',$id)->first();
            $Follow = new \App\Following;
            $Follow->MID = \Auth::user()->id;
            $Follow->MName = \Auth::user()->name;
            $Follow->FID = $user->id;
            $Follow->FName = $user->name;
            $Follow->save();
        }
        return redirect('/user/'.$id);
    }
}
