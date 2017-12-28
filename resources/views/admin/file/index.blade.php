@extends('admin.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					文件管理
				</h3>
			</div>
			<div class="panel-body">
				 @if (count($errors) > 0)
                 	<div class="alert alert-danger">
                    	<strong>新增失败</strong> 输入不符合要求<br><br>
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                 @endif

				<a href="{{ url('admin/files/create') }}" class="btn btn-lg btn-primary">上传</a>

				@foreach ($files as $file)
					<input type="hidden" value="{{ $file = trim($file,'public') }}"></input>
					<hr>
					<div class="file">
						<p>
							{{ $file }}
						</p>
						<a href="{{ url('storage'.$file) }}" class="btn btn-success">查看</a>
						<form action="{{ url('admin/files'.$file) }}" method="POST" style="display: inline;">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<input type="hidden" name="fileName" value="{{ $file}}">
							<button type="submit" class="btn btn-danger">删除</button>
						</form>
					</div>

				@endforeach

			</div>
		</div>
	</div>
</div>
@endsection
