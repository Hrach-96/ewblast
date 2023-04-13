@extends('layouts.admin.app')
@section('content')
<a class='btn btn-primary float-right m-3' href='{{route('admin.events.category.add_new')}}'>Add new</a>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name Am</th>
                <th>Name En</th>
                <th>Created date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($lists as $list)
	            <tr>
                	<td>{{$list->name_am}}</td>
                    <td>{{$list->name_en}}</td>
                	<td>{{$list->created_at}}</td>
                	<td>
                        <a class='btn btn-secondary' href="{{route('admin.events.category.edit',['id'=>$list->id])}}">Edit</a>
                        <a class='btn btn-danger' href="{{route('admin.events.category.delete',['id'=>$list->id])}}">Delete</a>
                    </td>
	            </tr>
        	@endforeach
        </tbody>
    </table>
    <div class='d-flex justify-content-center'>
    	{!! $lists->links('pagination::bootstrap-4')!!}
    </div>
@endsection