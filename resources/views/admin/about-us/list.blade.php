@extends('layouts.admin.app')
@section('content')
<a class='btn btn-primary float-right m-3' href='{{route('admin.about_us.add_new')}}'>Add new</a>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Title Am</th>
                <th>Title En</th>
                <th>Address Am</th>
                <th>Address En</th>
                <th>ordering</th>
                <th>Image</th>
                <th>Created date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($lists as $list)
	            <tr>
                	<td>{{$list->title_am}}</td>
                    <td>{{$list->title_en}}</td>
                    <td>{{$list->address_am}}</td>
                	<td>{{$list->address_en}}</td>
                	<td>{{$list->ordering}}</td>
                	<td>
                        <img height='120' src="{{ asset('storage/' . $list->image) }}" alt=''>
                    </td>
                	<td>{{$list->created_at}}</td>
                	<td>
                        <a class='btn btn-secondary' href="{{route('admin.about_us.edit',['id'=>$list->id])}}">Edit</a>
                        <a class='btn btn-danger' href="{{route('admin.about_us.delete',['id'=>$list->id])}}">Delete</a>
                    </td>
	            </tr>
        	@endforeach
        </tbody>
    </table>
    <div class='d-flex justify-content-center'>
    	{!! $lists->links('pagination::bootstrap-4')!!}
    </div>
@endsection