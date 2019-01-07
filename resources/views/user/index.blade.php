@extends('layouts.app')

@section('title')
	Dashboard
@endsection

@section('stylesheet')
	{{ asset('css/dashboard.css') }}
@endsection

@section('content')
<div class="container">
    <div class="main-body">    
    	@if($diaries->count() > 0)
    		<p class="page-header">
    			<span>All Diaries</span>
                <span class="badge badge-primary">
                    <small>Total <i class="fa fa-angle-right"></i> {{ $diaries->count() }}</small>
                </span>
                <a class="carve primary pull-right" href="{{ route('diary') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New</a>
    		</p>

    		<div class="table-responsive">
    			<table class="table table-hover">
    				<thead>
    					<tr>
    						<th></th>
    						<th width="800">Title</th>
    						<th>Date created</th>
    						<th>Last modified</th>
    					</tr>
    				</thead>
    				<tbody>
                        @for ($i = 0; $i < $diaries->count(); $i++)
    						<tr>
    							<td title="{{ $category[$i]->name }}"><div class="cat-preview" style="background: #{{ $category[$i]->color }}"></div></td>
    							<td class="titleclick" title="Preview" onclick="location.assign('{{ route('diary.view', ['id' => $diaries[$i]->id]) }}')"><a href="{{ route('diary.view', ['id' => $diaries[$i]->id]) }}">{{ $diaries[$i]->title }}</a></td>
    							<td>{{ $diaries[$i]->created_at->diffForHumans() }}</td>
    							<td>{{ $diaries[$i]->updated_at->diffForHumans() }}</td>
    						</tr>
                        @endfor
    				</tbody>
    			</table>
    		</div>

            <div class="row justify-content-center">
                {{ $diaries->links() }}
            </div>
    	@else
            <p class="page-header">
        		<span style="font-size: 250%;">No diary found!</span>
                <a class="carve primary" href="{{ route('diary') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Create one</a>
            </p>
    	@endif
    </div>
</div>
@endsection
