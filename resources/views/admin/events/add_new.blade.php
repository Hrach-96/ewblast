@extends('layouts.admin.app')
@section('content')
    <div class='col-4 offset-4'>
        <form action='{{route('admin.events.add_new')}}' enctype="multipart/form-data" method='post' >
            {{csrf_field()}}
            <div>
                <label for='title_am'>Title Am</label>
                <input id='title_am' name='title_am' type='text' class='form-control' placeholder="Title Am">
            </div>
            <div>
                <label for='title_en'>Title En</label>
                <input id='title_en' name='title_en' type='text' class='form-control' placeholder="Title En">
            </div>
            <div>
                <label for='category_id'>Category</label>
                <select class='form-control' name='category_id'>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_en}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for='image'>Image</label>
                <input type='file' name='image' class='form-control'>
            </div>
            <div>
                <label for='file_path'>File Path</label>
                <input type='file' id='file_path' name='file_path' class='form-control'>
            </div>
            <div>
                <label for='content_am'>Content Am</label>
                <textarea name='content_am' class='form-control'></textarea>
            </div>
                <label for='content_en'>Content En</label>
                <textarea name='content_en' class='form-control'></textarea>
            </div>

            <div>
                <input type='submit' class='btn btn-success mt-3'>
            </div>
        </form>
    </div>
@endsection