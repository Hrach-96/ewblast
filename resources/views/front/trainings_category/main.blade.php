@extends('layouts.front.app')
@section('content')
<div class="col-lg-8 content" style='margin-top:130px'>
	@foreach($trainings as $res)
		<div class="row itemblock">
			<div class="col-lg-12">
				<img src="{{ asset('storage/' . $res->image) }}" width="200" class="">
				<h2><a href="{{route('trainings.display',['id'=>$res->id,'lang'=>mainLang()])}}">{{$res['title_'.mainLang()]}}</a></h2>
				<p>{!! $res['content_'.mainLang()] !!}</p>
				<p><a href="{{route('trainings.display',['id'=>$res->id,'lang'=>mainLang()])}}">Կարդալ ավելին</a></p>
			</div>
		</div>
	@endforeach
</div>
@endsection