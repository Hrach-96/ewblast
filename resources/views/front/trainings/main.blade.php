@extends('layouts.front.app')
@section('content')
<div class="col-lg-8 content" style='margin-top:130px'>
	<div class='col-4'>
		<a href="{{ asset('storage/' . $trainings->image) }}">
            <img width='150' src="{{ asset('storage/' . $trainings->image) }}">
        </a>
	</div>
	<span class='titleBLueEffect'>{{$trainings['title_'.mainLang()]}}</span><br>
	{!! $trainings['content_'.mainLang()] !!}
</div>
@endsection