@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">管理后台</div>

                <div class="panel-body">
                	<a href="{{ url('admin/articles') }}" class="btn btn-lg btn-success col-xs-12">管理文章</a><br><br><br>
                    <a href="{{ url('admin/comments') }}" class="btn btn-lg btn-success col-xs-12">管理评论</a><br><br><br>
                    <a href="{{ url('admin/files') }}" class="btn btn-lg btn-success col-xs-12">管理文件</a><br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
