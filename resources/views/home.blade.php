@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<div >
            				@foreach ($articles as $article)
                				<div class="title">
                    				<a href="{{ url('article/'.$article->id) }}">
                        				<h4>{{ $article->title }}</h4>
                    				</a>
                				</div>
								<br>
                				<div class="body">
                    				<p>{{ $article->body }}</p>
                				</div>
								<hr>
            				@endforeach
    				</div>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
