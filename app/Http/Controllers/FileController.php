<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DFile;

class FileController extends Controller
{
    public function getContentFile() {
    	$files = DFile::all();
    	return view ('plagiarism.file', ['files' => $files]);
    }
}
