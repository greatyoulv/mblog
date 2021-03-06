@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel-heading">{{ $article->title }}</div>
				<div class="panel-body">
            		{{ $article->updated_at }}
            		{!! $article->body !!}
					<br>
            		@if (count($errors) > 0)
                		<div class="alert alert-danger">
                    		<strong>操作失败</strong> 输入不符合要求<br><br>
                    		{!! implode('<br>', $errors->all()) !!}
                		</div>
            		@endif
				<div id="new">
                	<form action="{{ url('comment') }}" method="POST">
                    	{!! csrf_field() !!}
                    	<input type="hidden" name="article_id" value="{{ $article->id }}">
                        <label>昵称</label>
                        <input type="text" name="nickname" class="form-control" required="required">
						<br>
                        <label>邮箱</label>
                        <input type="email" name="email" class="form-control" >
						<br>
                        <label>个人主页</label>
                        <input type="text" name="website" class="form-control" >
						<br>
                        <label>内容</label>
                        <textarea name="content" id="fieldTest" class="form-control" rows="3" ></textarea>
						<br>
                    	<button type="submit" class="btn btn-lg btn-success">提交</button>
                	</form>
				</div>
				<br>

                @foreach ($article->hasManyComments as $comment)
					<hr>
                    <div class="nickname" data="{{ $comment->nickname }}">
                    	@if ($comment->website)
                        	<a href="{{ $comment->website }}">
                            	<h3>{{ $comment->nickname }}</h3>
                            </a>
                        @else
                                <h3>{{ $comment->nickname }}</h3>
                        @endif
                            	<h6>{{ $comment->created_at }}</h6>
                    </div>
                    <div class="content">
                    	<p style="padding: 20px;">
                        	{!! $comment->content !!}
                        </p>
                    </div>
                @endforeach
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
