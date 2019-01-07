@extends('layouts.app')

@section('title')
	Diary
@endsection

@section('stylesheet')
	{{ asset('css/dashboard.css') }}
@endsection

@section('content')
<div class="container">
    <div class="main-body">
    	<p class="page-header">
    		<span>Diary Entry</span>
    	</p>
    	
    	<div class="">
        	@if ($errors->any())
	            <div class="alert alert-danger">
	                <ul>
	                    @foreach ($errors->all() as $error)
	                        <li>{{ $error }}</li>
	                    @endforeach
	                </ul>
	            </div>
	        @endif

        	<form method="POST" action="{{ route('diary') }}">
				@csrf

	            <div class="card record">
	            	<div class="card-header">
	            		<ul class="categories">
	            			<li class="cat-link">Choose category</li>
	            			@foreach($categories as $category)
	            				<li class="cat-link active" name="{{ $category->color }}" value="{{ $category->id }}">{{ $category->name }}</li>
	            			@endforeach
	            			<input id="category" type="hidden" name="category" value="1">
	            		</ul>

	            		@if ($errors->has('category'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif
	            	</div>
	            	<div class="card-body">
	            		<div class="form-group">
	            			<input id="mood_title" class="form-control{{ $errors->has('mood_title') ? ' is-invalid' : '' }}" type="text" name="mood_title" placeholder="Describe your mood" required autofocus>

	            			@if ($errors->has('mood_title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mood_title') }}</strong>
                                </span>
                            @endif
	            		</div>
	            		<div class="form-group">
	            			<textarea id="myContent" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="15"  required>Dear diary,</textarea>

	            			@if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
	            		</div>
	            		<div class="">
	            			<span class="pull-left">
		            			<button type="submit" class="btn btn-primary">
		                            {{ __('Save Diary') }}
		                        </button>
		                    </span>
		                    <span class="pull-right">
		            			<a class="btn btn-default" href="{{ route('home') }}">
		                            {{ __('Discard') }}
		                        </a>
		                    </span>
	            		</div>
	            	</div>
	            </div>
	        </form>
	    </div>
    </div>
</div>
@endsection
