@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					文件上传
				</h3>
			</div>
			<div class="panel-body">

				<form action="{{ url('admin/files') }}" method="POST" enctype="multipart/form-data" >
					{{ csrf_field() }}

					<input type="file" name="file"><br>
					<button type="submit" class="btn btn-success">提交</button>
				</form>

			</div>
		</div>
	</div>
</div>
@endsection
