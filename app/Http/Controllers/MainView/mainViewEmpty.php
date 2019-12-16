<?php

namespace App\Http\Controllers\MainView;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class MainViewEmpty extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show()
    {
        $user = \Auth::user();
        $pictureList = DB::table('pictures')->orderBy('Votes', 'ASC')
        ->get();
        return view('welcome', compact('pictureList','user'));

    }
}
