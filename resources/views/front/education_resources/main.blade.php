@extends('layouts.front.app')
@section('content')
<div class="col-lg-8 content" style='margin-top:130px'>
	<span class='titleBLueEffect'>{{$educationResourcesInfo['title_'.mainLang()]}}</span>
	{!! $educationResourcesInfo['content_'.mainLang()] !!}
</div>
@endsection