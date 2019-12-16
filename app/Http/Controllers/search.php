<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class search extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show(Request $request)
    {
        $Search = $request->post('search');
        $allUsers = \App\User::where('name', 'like', '%' .$Search. '%')->get();
        $allPictures = \App\picture::where('ImageName',$Search)
        ->where('object', '=', $Search);
        $user = \Auth::user();

        return view('SearchRes',compact('user', 'Search', 'allUsers','allPictures'));
    }
}