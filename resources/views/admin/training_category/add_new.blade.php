@extends('layouts.admin.app')
@section('content')
    <div class='col-4 offset-4'>
        <form action='{{route('admin.training.category.add_new')}}' enctype="multipart/form-data" method='post' >
            {{csrf_field()}}
            <div>
                <label for='name_am'>Name Am</label>
                <input id='name_am' name='name_am' type='text' class='form-control' placeholder="Name Am">
            </div>
            <div>
                <label for='name_en'>Name En</label>
                <input id='name_en' name='name_en' type='text' class='form-control' placeholder="Name En">
            </div>
            <div>
                <input type='submit' class='btn btn-success mt-3'>
            </div>
        </form>
    </div>
@endsection