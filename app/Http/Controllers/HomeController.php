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

    public function getKeywords() {
        return view('plagiarism.keywords');
    }

    public function postKeywords(Request $request) {
        $topic = $request->browser;
        $keyword = $request->txtKeyword;

        if($topic == '') {
            return redirect('keywords')->with(["flash_level" => "danger", "flash_message" => "Vui lòng chọn chủ đề"]);
        }else if($keyword == '') {
            return redirect('keywords')->with(["flash_level" => "danger", "flash_message" => "Chưa nhập keyword"]);
        }

        // Kiem tra ton tai
        $fileKey = fopen( "../python/keywords/" . changeTitle($topic) . ".txt", "r");
        
        while(! feof($fileKey))
        {
            $tr = fgets($fileKey);
            if(strpos($tr, $keyword) !== false) {
                return redirect('keywords')->with(["flash_level" => "danger", "flash_message" => "Keywords đã tồn tại"]);
            }
        }
        fclose($fileKey);


        // Insert
        $fileKey = fopen( "../python/keywords/" . changeTitle($topic) . ".txt", "a");
        fwrite($fileKey, $keyword);
        fwrite($fileKey, PHP_EOL);
        fclose($fileKey);

        return redirect('keywords')->with(["flash_level" => "success", "flash_message" => "Thêm thành công"]);
    }
}
