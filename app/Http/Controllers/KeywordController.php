<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    public function index() {
    	return view('plagiarism.keywords');
    }

    public function ajaxKeywords(Request $request) {
        $input = $request->all();
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        echo $input['image'];
    }
}
