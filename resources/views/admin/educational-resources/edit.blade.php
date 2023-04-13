@extends('layouts.admin.app')
@section('content')
    <div class='col-12'>
        <form action="{{route('admin.educational.resources.edit',['id'=>$education_resource->id])}}" enctype="multipart/form-data" method='post' >
            {{csrf_field()}}
            <div class='row'>
                <div class='col-6'>
                    <label for='title_am'>Title Am</label>
                    <input id='title_am' value="{{$education_resource->title_am}}" name='title_am' type='text' class='form-control' placeholder="Title Am">
                </div>
                <div class='col-6'>
                    <label for='title_en'>Title En</label>
                    <input value="{{$education_resource->title_en}}" id='title_en' name='title_en' type='text' class='form-control' placeholder="Title En">
                </div>
                <div class='col-6'>
                    <label for='content_am'>Content Am</label>
                    <textarea name='content_am' class='form-control editorTextarea'>{{$education_resource->content_am}}</textarea>
                </div>
                <div class='col-6'>
                    <label for='content_en'>Content En</label>
                    <textarea name='content_en' class='form-control editorTextarea'>{{$education_resource->content_am}}</textarea>
                </div>
            </div>
            <div>
                <input type='submit' class='btn btn-success mt-3'>
            </div>
        </form>
    </div>
@endsection