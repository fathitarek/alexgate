<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
        public function changelanguage(Request $request)
    {
    	\Session::put('locale',$request->lang);
    }
}
