<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\DFile;
use Auth;

class CheckController extends Controller
{
    public function index() {
    	return view('plagiarism.check');
    }

    public function ajaxKeywords(Request $request) {
        if($request->txtCategory == ''){
            echo "<p style='color:red'>Vui lòng chọn chủ đề</p>";
            return;
        }

        $extension = $request->file('file')->getClientOriginalExtension(); 
        if($extension !== 'docx'){
            echo "<p style='color:red'>Vui lòng chọn file có định dạng docx</p>";
            return;
        }

        $name = $request->file('file')->getClientOriginalName();

        $dir = 'plagiarism/uploads/';
        $name_upload = uniqid() . '_' . time() . '.' . $extension;
        $request->file('file')->move($dir, $name_upload);

        /*$fileKey = fopen( "../python/keywords/result" . ".txt", "w");
        fwrite($fileKey, readDocx($filename, changeTitle($request->txtCategory)));
        fclose($fileKey);*/

        $rPara = readParaDocx($name_upload, changeTitle($request->txtCategory));
        $rTable = readTableDocx($name_upload, changeTitle($request->txtCategory));


        /*$xml=simplexml_load_string($r) or die("Error: Cannot create object");
        print_r($xml);*/
        
        // Save info to table files
        $file = new DFile;
        $file->user_id = Auth::user()->id;
        $file->name = $name;
        $file->name_upload = $name_upload;
        $file->content = $rPara;
        $file->table = $rTable;
        $file->number = 0;
        $file->percent = 0;

        $file->save();

        echo "<p style='color:green'>Success</p>";
        

    }
    public function getRemoveFile($filename)
    {
        File::delete('plagiarism/uploads/' . $filename);
    }
}
