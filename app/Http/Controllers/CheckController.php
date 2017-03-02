<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CheckController extends Controller
{
    public function index() {
    	return view('plagiarism.check');
    }

    public function ajaxKeywords(Request $request) {
        /*$validator = Validator::make($request->all(),
            [
                'file' => 'txt',
            ],
            [
                'file.txt' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
            ]);
        if ($validator->fails())
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );*/

        if($request->txtCategory == ''){
            echo "<p style='color:red'>Vui lòng chọn chủ đề</p>";
            return;
        }

        $extension = $request->file('file')->getClientOriginalExtension(); // getting image extension
        $dir = 'plagiarism/uploads/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('file')->move($dir, $filename);

        $fileKey = fopen( "../python/keywords/result" . ".txt", "w");
        fwrite($fileKey, readDocx($filename, changeTitle($request->txtCategory)));
        fclose($fileKey);

        echo readDocx($filename, changeTitle($request->txtCategory));

    }
    public function getRemoveFile($filename)
    {
        File::delete('plagiarism/uploads/' . $filename);
    }

    
}