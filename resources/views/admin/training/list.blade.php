@extends('layouts.admin.app')
@section('content')
<input type='hidden' value="{{route('training.update.display.main')}}" class='training-update-display-main'>
<a class='btn btn-primary float-right m-3' href='{{route('admin.training.add_new')}}'>Add new</a>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Title Am</th>
                <th>Title En</th>
                <th>Image</th>
                <th>Category</th>
                <th>Display Main Part</th>
                <th>Created date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($lists as $list)
	            <tr>
                	<td>{{$list->title_am}}</td>
                    <td>{{$list->title_en}}</td>
                    <td>
                        <img height='120' src="{{ asset('storage/' . $list->image) }}" alt=''>
                    </td>
                	<td>{{$list->categoryInfo->name_en}}</td>
                    <td>
                        <input name='display_main' class='display_main_training' type='checkbox' data-id="{{$list->id}}" {{($list->display_main == 1)? 'checked' : ''}}>
                    </td>
                    <td>{{$list->created_at}}</td>
                	<td>
                        <a class='btn btn-secondary' href="{{route('admin.training.edit',['id'=>$list->id])}}">Edit</a>
                        <a class='btn btn-danger' href="{{route('admin.training.delete',['id'=>$list->id])}}">Delete</a>
                    </td>
	            </tr>
        	@endforeach
        </tbody>
    </table>
    <div class='d-flex justify-content-center'>
    	{!! $lists->links('pagination::bootstrap-4')!!}
    </div>
@endsection