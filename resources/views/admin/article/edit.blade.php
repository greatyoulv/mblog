@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">修改文章</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>修改失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/articles/'.$article->id) }}" method="POST">
						{{ method_field('PATCH') }}
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{ $article->title  }}">
                        <br>
                        <textarea name="body" id="fieldTest" rows="10" class="form-control" placeholder="请输入内容">{{ $article->body  }}</textarea>
                        <br>
                        <button class="btn btn-lg btn-info">保存修改</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
