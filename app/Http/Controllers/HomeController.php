<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
    	
    	return view('plagiarism.index');
    }

    public function loadDB() {
    	$vietdicts = DB::table('vietdict')->get();

    	foreach ($vietdicts as $vietdict) {
    		echo $vietdict->words . "<br />";
    	}
    }
}
