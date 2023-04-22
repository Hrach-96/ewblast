@extends('layouts.admin.app')
@section('content')
@php
	$display_about_us = getSiteSetting('display_about_us');
	$display_news = getSiteSetting('display_news');
	$display_events = getSiteSetting('display_events');
	$display_educational_resources = getSiteSetting('display_educational_resources');
@endphp
    <div class='col-12'>
        <form action="{{route('admin.site.settings.edit')}}" enctype="multipart/form-data" method='post' >
            {{csrf_field()}}
            <div class='row'>
            	<div class='col-3 text-center'>
            		<h5>Display About Us</h5>
            		<div>
	            		<label for='display_about_us_yes'>Yes</label>
	            		<input type='radio' value='1' {{($display_about_us->value == 1)? 'checked' : ''}} name='display_about_us' id="display_about_us_yes">
            		</div>
            		<div>
	            		<label for='display_about_us_no'>No</label>
	            		<input type='radio' value='0' name='display_about_us' {{($display_about_us->value == 0)? 'checked' : ''}} id="display_about_us_no">
            		</div>
            	</div>
            	<div class='col-3 text-center'>
            		<h5>Display News</h5>
            		<div>
	            		<label for='display_news_yes'>Yes</label>
	            		<input type='radio' value='1' {{($display_news->value == 1)? 'checked' : ''}} name='display_news' id="display_news_yes">
            		</div>
            		<div>
	            		<label for='display_news_no'>No</label>
	            		<input type='radio' value='0' name='display_news' {{($display_news->value == 0)? 'checked' : ''}} id="display_news_no">
            		</div>
            	</div>
            	<div class='col-3 text-center'>
            		<h5>Display Events</h5>
            		<div>
	            		<label for='display_events_yes'>Yes</label>
	            		<input type='radio' value='1' {{($display_events->value == 1)? 'checked' : ''}} name='display_events' id="display_events_yes">
            		</div>
            		<div>
	            		<label for='display_events_no'>No</label>
	            		<input type='radio' value='0' name='display_events' {{($display_events->value == 0)? 'checked' : ''}} id="display_events_no">
            		</div>
            	</div>
            	<div class='col-3 text-center'>
            		<h5>Display Educational Resources</h5>
            		<div>
	            		<label for='display_educational_resources_yes'>Yes</label>
	            		<input type='radio' value='1' {{($display_educational_resources->value == 1)? 'checked' : ''}} name='display_educational_resources' id="display_educational_resources_yes">
            		</div>
            		<div>
	            		<label for='display_educational_resources_no'>No</label>
	            		<input type='radio' value='0' name='display_educational_resources' {{($display_educational_resources->value == 0)? 'checked' : ''}} id="display_educational_resources_no">
            		</div>
            	</div>
            	<div class='col-3'>
            		<label for='phone'>Phone</label>
            		<input type='text' name='phone' class='form-control' placeholder='phone' value="{{getSiteSetting('phone')->value}}">
            	</div>
            	<div class='col-3'>
            		<label for='email'>E-mail</label>
            		<input type='text' name='email' class='form-control' placeholder='email' value="{{getSiteSetting('email')->value}}">
            	</div>
            	<div class='col-3'>
            		<label for='address'>Address</label>
            		<input type='text' name='address' class='form-control' placeholder='address' value="{{getSiteSetting('address')->value}}">
            	</div>
            	<div class='col-3'>
            		<label for='link'>Link</label>
            		<input type='text' name='link' class='form-control' placeholder='link' value="{{getSiteSetting('link')->value}}">
            	</div>
            </div>
            <div>
                <input type='submit' class='btn btn-success mt-3 float-right'>
            </div>
        </form>
    </div>
@endsection