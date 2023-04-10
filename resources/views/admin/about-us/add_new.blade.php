@extends('layouts.admin.app')
@section('content')
    <div class='col-4 offset-4'>
        <form action='{{route('admin.about_us.add_new')}}' enctype="multipart/form-data" method='post' >
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
                <label for='address_am'>Address Am</label>
                <input id='address_am' name='address_am' type='text' class='form-control' placeholder="Address">
            </div>
            <div>
                <label for='address_en'>Address En</label>
                <input id='address_en' name='address_en' type='text' class='form-control' placeholder="Address En">
            </div>
            <div>
                <label for='ordering'>Ordering</label>
                <input id='ordering' name='ordering' type='number' class='form-control' placeholder="Ordering">
            </div>
            <div>
                <label for='image'>Image</label>
                <input type='file' name='image' class='form-control'>
            </div>
            <div>
                <input type='submit' class='btn btn-success mt-3'>
            </div>
        </form>
    </div>
@endsection