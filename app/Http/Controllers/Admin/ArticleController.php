<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;
use App\HyperDown\Markdown;

class ArticleController extends Controller
{
    //
	protected $markdown;
	public function __construct(Markdown $markdown)
	{
		$this->markdown = $markdown;
	}

	public function index()
	{
		$articles = Article::all();
		
		foreach($articles as $k => $article)
		{
			$body = $this->markdown->markdown($article->body);
			$articles[$k]->body = $body;
		}
		
		return view('admin/article/index',compact('articles'));
		//return view('admin/article/index')->with('articles',Article::all());
	}

	public function create()
	{
		return view('admin/article/create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|unique:articles|max:255',
			'body' => 'required',
		]);

		$article = new Article;
		$article->title = $request->get('title');
		$article->body = $request->get('body');
		$article->user_id = $request->user()->id;

		if($article->save()){
			return redirect('admin/articles');
		} else{
			return redirect()->back()->withInput()->withErrors('保存失败');
		} 
	}

	public function edit($id)
	{
		return view('admin/article/edit')->withArticle(Article::find($id));
	}

	public function update(Request $request,$id )
	{
		$this->validate($request, [
			'title' => 'required|unique:articles,title,'.$id.'|max:255',
			'body' => 'required',
		]);

		$article = Article::find($id);
		$article->title = $request->get('title');
		$article->body = $request->get('body');

		if($article->save()){
			return redirect('admin/articles');
		} else {
			return redirect()->back()->withInput()->withErrors('修改失败');
		}
	}

	public function destroy($id)
	{
		Article::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功');
	}
}

