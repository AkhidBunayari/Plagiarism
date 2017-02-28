<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    public function index() {
    	return view('plagiarism.keywords');
    }

    public function ajaxKeywords() {

    	if(isset($_GET['fileName'])) {
    		
    		$data = fopen($_GET['fileName'],'r');
    		foreach($data as $line)
			{
			   echo $line .'<br>';
			}
    	}
    }
}
