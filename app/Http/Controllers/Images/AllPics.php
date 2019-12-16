<?php

namespace App\Http\Controllers\Images;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class AllPics extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show()
    {
        $user = \Auth::user();
        $Tags =  \App\Tags::all();
        return view('AllGallery', compact('user','Tags'));
    }
}
