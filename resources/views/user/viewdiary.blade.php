@extends('layouts.app')

@section('title')
	Diary — View
@endsection

@section('stylesheet')
	{{ asset('css/dashboard.css') }}
@endsection

@section('content')
	<div class="container">
    	<div class="main-body">
    		<p class="page-header">
    			<span>{{ $diary->title }}</span> 
                <ul class="options">
                    <li><a class="carve blue" href="{{ route('diary.edit', ['id' => $diary->id]) }}"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a></li>
                    <li><a class="carve danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a></li>
                    <li><a class="carve primary" href="{{ route('diary') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New</a></li>
                </ul>
    		</p>

    		<p>Category: <b style="color: #{{ $category->color }}">{{ $category->name }}</b></p>
    		<div class="diary-content">
    			{!! htmlspecialchars_decode($diary->content) !!}
    		</div>

            <form method="POST" action="{{ route('diary.delete', ['id' => $diary->id]) }}">
                @csrf

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal">
                                    Confirmation
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center font-weight-bold">
                                    <p class="danger">Are you sure you want to delete this diary?</p>
                                    <p class="font-italic">Action cannot be reversed!</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Continue') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    	</div>
    </div>
@endsection