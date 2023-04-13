@extends('layouts.admin.app')
@section('content')
    <div class='col-4 offset-4'>
        <form action="{{route('admin.news.category.edit',['id'=>$category->id])}}" enctype="multipart/form-data" method='post' >
            {{csrf_field()}}
            <div>
                <label for='name_am'>Name Am</label>
                <input id='name_am' value="{{$category->name_am}}" name='name_am' type='text' class='form-control' placeholder="Name Am">
            </div>
            <div>
                <label for='name_en'>Title En</label>
                <input value="{{$category->name_en}}" id='name_en' name='name_en' type='text' class='form-control' placeholder="Name En">
            </div>
            <div>
                <input type='submit' class='btn btn-success mt-3'>
            </div>
        </form>
    </div>
@endsection