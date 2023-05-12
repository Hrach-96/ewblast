@extends('layouts.front.app')
@section('content')
<div class="col-lg-8 content" style='margin-top:130px'>
	<div class='col-4'>
		<a href="{{ asset('storage/' . $events->image) }}">
            <img width='150' src="{{ asset('storage/' . $events->image) }}">
        </a>
	</div>
	<span class='titleBLueEffect'>{{$events['title_'.mainLang()]}}</span><br>
	{!! $events['content_'.mainLang()] !!}
</div>
@endsection