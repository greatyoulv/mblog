<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use App\Comment;
use App\HyperDown\Markdown;

class CommentController extends Controller
{
    //
	protected $markdown;
	public function __construct(Markdown $markdown)
	{
		$this->markdown = $markdown;
	}

	public function index()
	{
		$comments = Comment::all();
		
		foreach($comments as $k => $comment)
		{
			$content = $this->markdown->markdown($comment->content);
			$comments[$k]->content = $content;
		}

		return view('admin/comment/index',compact('comments'));
		//return view('admin/comment/index')->withComments(Comment::all());
	}
	
	public function edit($id)
	{
		return view('admin/comment/edit')->withComment(Comment::find($id));
	}

	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'nickname' => 'required',
			'content' => 'required',
		]);
			
		if(Comment::where('id',$id)->update(Input::except(['_method','_token']))) {
			return redirect()->back();
		} else {
			return redirect()->back()->withInput()->withErrors('修改评论失败');
		}
	}

	public function destroy($id)
	{
		Comment::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功');
	}
}
