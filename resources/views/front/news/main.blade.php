@extends('layouts.front.app')
@section('content')
<div class="col-lg-8 content" style='margin-top:130px'>
	<div class='col-4'>
		<a href="{{ asset('storage/' . $news->image) }}">
            <img width='150' src="{{ asset('storage/' . $news->image) }}">
        </a>
	</div>
	<span class='titleBLueEffect'>{{$news['title_'.mainLang()]}}</span><br>
	{!! $news['content_'.mainLang()] !!}
</div>
@endsection