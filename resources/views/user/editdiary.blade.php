@extends('layouts.app')

@section('title')
	Diary — Edit
@endsection

@section('stylesheet')
	{{ asset('css/dashboard.css') }}
@endsection

@section('content')
	<div class="container">
    	<div class="main-body">
    		<p class="page-header">
    			<span>Edit Diary</span>
    		</p>

    		<form method="POST" action="{{ route('diary.update', ['id' => $diary->id]) }}">
                @csrf

                <div class="card record">
                    <div class="card-header">
                        <ul class="categories">
                            <li class="cat-link">Category</li>
                            <!-- Current category -->
                            <li class="cat-link active" name="{{ $category->color }}" value="{{ $category->id }}" style="background: #{{ $category->color }}; color: #ffffff;">{{ $category->name }}</li>
                            <!-- Other categories -->
                            @foreach($allCategories as $categories)
                                @unless($category->id == $categories->id)
                                    <li class="cat-link active" name="{{ $categories->color }}" value="{{ $categories->id }}">{{ $categories->name }}</li>
                                @endunless
                            @endforeach
                            <input id="category" type="hidden" name="category" value="{{ $diary->category_id }}">
                        </ul>

                        @if ($errors->has('category'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mood</label>
                            <input id="mood_title" class="form-control{{ $errors->has('mood_title') ? ' is-invalid' : '' }}" type="text" name="mood_title" value="{{ $diary->title }}" placeholder="Describe your mood" required autofocus>

                            @if ($errors->has('mood_title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mood_title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="myContent" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="15"  required>{!! $diary->content !!}</textarea>

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
                                <a class="btn btn-default" href="{{ route('diary.view', ['id' => $diary->id]) }}">
                                    {{ __('Cancel') }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
    	</div>
    </div>
@endsection