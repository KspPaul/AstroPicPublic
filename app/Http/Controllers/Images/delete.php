<?php
namespace App\Http\Controllers\Images;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

/*
* This deletes a picture
*/


use DB;
use App\Quotation;
use Schema;
class delete extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($pictureName)
    {
        $picture = \App\picture::where('imageNumber',$pictureName)->first();
        if($picture != null)
        {
            if($picture->user_ID == \Auth::id())
            {
                \App\comment::where('pictureName', $picture->id)->delete();
                \App\ProcessList::where('ImageID',$picture->id)->delete();
                \App\Likes::where('ImageID',$picture->id)->delete();
                \App\picture::where('imageNumber', $pictureName)->delete();
                Storage::delete('images/'.$pictureName);
                
            }
        }
        return redirect('/user/'.\Auth::id());
    }
}
