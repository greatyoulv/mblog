@extends('admin.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">编辑评论</div>
				<div class="panel-body">
					@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

					<form action="{{ url('admin/comments/'.$comment->id) }}" method="POST">
						{{ method_field('PUT') }}
						{!! csrf_field()!!}
						
						<input type="hidden" name="article_id" value="{{ $comment->article_id }}">
                        <label>Nickname</label>
                        <input type="text" name="nickname" class="form-control" required="required" value="{{ $comment->nickname }}">
                        <br>
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" required="required" value="{{ $comment->email }}">
                        <br>
                        <label>Home page</label>
                        <input type="text" name="website" class="form-control" required="required" value="{{ $comment->website }}">
                        <br>
                        <label>Content</label>
                        <textarea name="content" id="fieldTest" class="form-control" rows="10" >{{ $comment->content }}</textarea>
                        <br>
						<button class="btn btn-lg btn-info">提交修改</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
