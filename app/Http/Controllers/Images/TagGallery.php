<?php

namespace App\Http\Controllers\Images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class TagGallery extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($Tag)
    {
        $picture = \App\picture::where('object',$Tag)->get();
        $user = \Auth::user();
        return view('SinglePicG', compact('user','picture'));
    }
}
