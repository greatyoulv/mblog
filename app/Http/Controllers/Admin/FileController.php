<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Storage;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    //
	public function index()
	{
		$files = Storage::disk('local')->Files('/');
		#dd($files);
		return view('admin/file/index')->with("files",$files);
	}

	public function create()
	{
		return view('admin/file/create');
	}

	public function store(Request $request)
	{

            // 文件是否上传成功
            if ($request->hasFile('file'))
			{
           		$file = $request->file('file');

				if($file->isValid())
				{

                // 获取文件相关信息
                //$ext = $file->extension();     // 扩展名
                //$type = $file->getClientMimeType();     // image/jpeg
				//$realPath = $file->getRealPath();
				#$path = $file->storeAs('/','1.jpg');
				
				#dd($path);
				//echo "{$realPath}";

                // 上传文件
				//$filename = $file->getClientOringinalName();
				//echo "{$filename}";
				//$file->move('public',$filename);
			//	$store_result = $file->store('public');
				Storage::disk('local')->putFile('/', $file);
				}
			}
			
        return redirect('admin/files');
      }


	public function destroy($fileName)
	{
		#$file = $fileName;
		#$file = trim($fileName,'//');
		#$file = 'public'.$file;
		Storage::disk('local')->delete($fileName);
		return redirect()->back()->withErrors('删除成功');
	}

}
