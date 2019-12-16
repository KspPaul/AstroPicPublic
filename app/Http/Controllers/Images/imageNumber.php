<?php

namespace App\Http\Controllers\Images;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class imageNumber extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($imageNumber)
    {
        $image = null;
        $user = \Auth::user();
        $x = true;
        $picture = \App\picture::where('imageNumber',$imageNumber)->first();
        $postUser = \App\User::where('id',$picture->user_ID)->first();
        if(\Auth::check())$image = \App\Likes::where('ImageID',$picture->id)->where('UID',\Auth::id())->first();
        if($image == null)
        {
            $x = false;
        }
        else
        {
            $x = true;
        }
        $comments = \App\comment::where('pictureName', '=', \App\picture::where('imageNumber', '=', $imageNumber)->first()->id)->orderBy('created_at', 'desc')->get();       
        $sameUser = false;
        if($picture->user_ID == \Auth::id())
        {
            $sameUser = true;
        }
        return view('imageInfo', compact('postUser','picture','user','x','comments','sameUser'));
    }
}
