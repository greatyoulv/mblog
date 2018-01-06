<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HyperDown\Markdown;
use App\Article;

class ArticleController extends Controller
{
    //
	protected $markdown;
	public function __construct(Markdown $markdown)
	{
		$this->markdown = $markdown;
	}

	public function show($id)
	{
		$article = Article::with('hasManyComments')->find($id);
		$body = $this->markdown->markdown($article->body);
		$article->body = $body;
		return view('article/show',compact('article'));

		//return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
	}
}


