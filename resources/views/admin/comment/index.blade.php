@extends('admin.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">评论管理</div>

				<div class="panel-body">
					@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

					@foreach ($comments as $comment)
						<label>评论内容</label><br>
						{!! $comment->content !!}<br><br>
						<label>评论用户</label><br>
						{{ $comment->nickname }}<br>
						{{ $comment->email }}<br><br>
						<label>被评文章</label><br>
						<a href="{{ url('article/'.$comment->article_id)  }}">{{ $comment->article_id }}</a><br>
						<a href="{{ url('admin/comments/'.$comment->id.'/edit')  }}" class="btn btn-success">编辑</a>
						<form action="{{ url('admin/comments/'.$comment->id)  }}" method="POST" style="display: inline;">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button type="submit" class="btn btn-danger">删除</button>
						</form>
						<hr>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
