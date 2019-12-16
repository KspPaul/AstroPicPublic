<?php

namespace App\Http\Controllers\Images;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class likeImage extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($pictureName)
    {

        if(\Auth::check())
        {
            $image = \App\picture::where('imageNumber',$pictureName)->first();
            $like = \App\Likes::where('ImageID',$image->id)->where('UID',\Auth::id())->first();
        //  $user = DB::table('Likes'.\Auth::id())->where('ImageNumber', $pictureName)->first();
            if($like == null)
            {
                $like = new \App\Likes;
                $like->ImageID = $image->id;
                $like->UID = \Auth::id();
                $like->save();

                $picture = \App\picture::where('id',$image->id)->first();
                $picture->Votes++;
                $picture->save();
            }
            else
            {
                \App\Likes::where('ImageID',$image->id)->where('UID',\Auth::id())->delete();
                $picture = \App\picture::where('id',$image->id)->first();
                $picture->Votes--;
                $picture->save();
            }
        }

        return redirect('/image/'.$pictureName);
    }
}
