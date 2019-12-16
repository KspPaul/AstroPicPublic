<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Quotation;
use Schema;
class VerifyMail extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($code)
    {
        $verify = \App\VerifyMail::where('VID','=',$code)->first();
        if($verify == NULL) return redirect('Gallery');
        $x = \App\VerifyMail::where('VID','=',$code)->delete();  
        return redirect('Gallery');                         
    }
}
