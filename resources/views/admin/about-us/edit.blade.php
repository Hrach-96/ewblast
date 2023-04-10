@extends('layouts.admin.app')
@section('content')
    <div class='col-4 offset-4'>
        <form action="{{route('admin.about_us.edit',['id'=>$about_us->id])}}" enctype="multipart/form-data" method='post' >
            {{csrf_field()}}
            <div>
                <label for='title_am'>Title Am</label>
                <input id='title_am' value="{{$about_us->title_am}}" name='title_am' type='text' class='form-control' placeholder="Title Am">
            </div>
            <div>
                <label for='title_en'>Title En</label>
                <input value="{{$about_us->title_en}}" id='title_en' name='title_en' type='text' class='form-control' placeholder="Title En">
            </div>
            <div>
                <label for='address_am'>Address Am</label>
                <input id='address_am' name='address_am' value="{{$about_us->address_am}}" type='text' class='form-control' placeholder="Address">
            </div>
            <div>
                <label for='address_en'>Address En</label>
                <input id='address_en' name='address_en' type='text' class='form-control' value="{{$about_us->address_en}}" placeholder="Address En">
            </div>
            <div>
                <label for='ordering'>Ordering</label>
                <input id='ordering' name='ordering' type='number' class='form-control' value="{{$about_us->ordering}}" placeholder="Ordering">
            </div>
            <div>
                <label for='image'>Image</label>
                <input type='file' name='image' class='form-control'>
            </div>
            <img height='120' src="{{ asset('storage/' . $about_us->image) }}">
            <div>
                <input type='submit' class='btn btn-success mt-3'>
            </div>
        </form>
    </div>
@endsection