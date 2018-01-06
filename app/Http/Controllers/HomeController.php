<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HyperDown\Markdown;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	protected $markdown;
    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$articles = Article::all();

		foreach($articles as $k => $article)
		{
			//$parser = new Markdown;
			$body =$this->markdown->markdown($article->body);
			//$body = $parser->makeHtml($article->body);
			//$body = mb_strcut($body);
			$articles[$k]->body = $body;
		}

		return view('home',compact('articles'));
        //return view('home')->with('articles',\App\Article::all());
    }
}

