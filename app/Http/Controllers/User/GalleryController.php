<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($id)
    {
        $user = \Auth::user();
        $userName = DB::table('users')->where('id', $id)->first()->name;


        $loadedUser =  \App\userData::where('id',$id)->first();
        if($loadedUser == null)
        {
            $loadedUser = new \App\userData;
            $loadedUser->id = $id;
            $loadedUser->timestamps = false;
            $loadedUser->description = '';
            $loadedUser->save();
        }
        error_log($loadedUser);
        $picture = \App\picture::where('user_ID',$id)->orderBy('created_at', 'desc')->paginate(50);

        // 1 when same 
        // 2 when following
        // 3 when not following
        $checkN = 1;

        if($id != \Auth::id())
        {

            $userFL = \App\Following::where('MID',\Auth::id())->where('FID',$id)->first();
            if (is_null($userFL)) {
                $checkN = 2;
            }
            else
            {
                $checkN = 3;
            }
        } 
        $Follower = \App\Following::where('FID',$id)->get();
        $Following =\App\Following::where('MID',$id)->get();
        return view('gallery', compact('user','picture','loadedUser','userName','Follower','Following','checkN','id'));
    
    }
}
