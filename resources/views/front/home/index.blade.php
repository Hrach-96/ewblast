@extends('layouts.front.app')
@section('content')
@php
	$topNews = App\Models\News::orderBy('id', 'desc')->take(2)->get();
	$bottomNews = App\Models\News::orderBy('id', 'desc')->skip(2)->take(5)->get();
@endphp
<div class="row news-block">
	<div id="carousel-example-generic" class="carousel slide clearfix" data-ride="carousel">
		<div class="left-arrow">
			<a href="https://ewb.am/#carousel-example-generic" data-slide="prev" class="left-arrow-button"></a>
		</div>
		<div class="carousel-inner news-block-carousel">
			<div class="item active">
				@foreach($topNews as $news)
					<div class="col-xs-6 media">
						<a class="pull-left" href="#">
							<img src="{{ asset('storage/' . $news->image) }}" alt="" class="media-object img-circle news-circle-image">
						</a>
						<div class="media-body">
							<h4 class="media-heading"><a href="https://ewb.am/am/news/view/1406">{{$news['title_' . mainLang()]}}</a></h4>
							<div class="trim-text"><p>{!! $news['content_' . mainLang()] !!}</p></div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<div class="right-arrow">
			<a href="https://ewb.am/#carousel-example-generic" data-slide="next" class="right-arrow-button"></a>
		</div>
	</div>
</div>
<div class="col-lg-8 content">
	@foreach($bottomNews as $news)
		<div class="row itemblock">
			<div class="col-lg-12">
				<img src="{{ asset('storage/' . $news->image) }}" width="200" class="">
				<h2><a href="https://ewb.am/am/news/view/1472">{{$news['title_'.mainLang()]}}</a></h2>
				<p>{!! $news['content_'.mainLang()] !!}</p>
				<p><a href="https://ewb.am/am/news/view/1472">Կարդալ ավելին</a></p>
			</div>
		</div>
	@endforeach
</div>
@endsection