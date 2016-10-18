
@extends('normal.template.main')
@section('title',' Viury.informando')


@section('content')

<h3 class="text-left title-normal">{{trans('app.title_last_Articles')}}</h3>
<div class="row">
	@foreach($articles as $article)
	<div class="col-md-4">
		<div class="panel panel-default " id="article-area">
			<div class="panel-body">
				<a href="{{ route('normal.view.article',$article->id) }}" class="thumbnail">
					@foreach($article->images as $image)
						<img src="{{'/images/articulo.jpg' }}" class="img-responsive img-article">
					@endforeach
				</a>
				<a href="{{ route('normal.view.article',$article->id) }}" class="a-title">
				<h4 class="text-center">{{ $article->title}}</h4>
				</a>
				
				<hr>
				<i class="fa fa-folder-open-o"></i> <a href="{{ route('normal.search.category', $article->category->name)}}">{{$article->category->name}}</a>
				<div class="pull-right">
					<i class="fa fa-clock-o"></i> 
					<span>{{ $article->created_at->diffForHumans()}}</span>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<div class="text-center">
	{!! $articles->render() !!}
</div>
@endsection