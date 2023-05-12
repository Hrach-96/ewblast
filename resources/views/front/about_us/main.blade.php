@extends('layouts.front.app')
@section('content')
<div class="col-lg-8 content" style='margin-top:130px'>
	<div class='col-4'>
		<a href="{{ asset('storage/' . $aboutUsInfo->image) }}">
            <img width='150' src="{{ asset('storage/' . $aboutUsInfo->image) }}">
        </a>
	</div>
	<span class='titleBLueEffect'>{{$aboutUsInfo['title_'.mainLang()]}}</span>
</div>
@endsection