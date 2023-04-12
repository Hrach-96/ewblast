@extends('layouts.admin.app')
@section('content')
    <div class='col-4 offset-4'>
        <form action='{{route('admin.news.edit',['id'=>$news->id])}}' enctype="multipart/form-data" method='post' >
            {{csrf_field()}}
            <div>
                <label for='title_am'>Title Am</label>
                <input id='title_am' value="{{$news->title_am}}" name='title_am' type='text' class='form-control' placeholder="Title Am">
            </div>
            <div>
                <label for='title_en'>Title En</label>
                <input id='title_en' value="{{$news->title_en}}" name='title_en' type='text' class='form-control' placeholder="Title En">
            </div>
            <div>
                <label for='category_id'>Category</label>
                <select class='form-control' name='category_id'>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{($news->category_id == $category->id)? 'selected' : ''}} >{{$category->name_en}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for='image'>Image</label>
                <input type='file' name='image' class='form-control'>
                <img height='120' src="{{ asset('storage/' . $news->image) }}">
            </div>
            <div>
                <label for='content_am'>Content Am</label>
                <textarea name='content_am' class='form-control'>{{$news->content_am}}</textarea>
            </div>
                <label for='content_en'>Content En</label>
                <textarea name='content_en' class='form-control'>{{$news->content_en}}</textarea>
            </div>

            <div>
                <input type='submit' class='btn btn-success mt-3'>
            </div>
        </form>
    </div>
@endsection