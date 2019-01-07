@extends('layouts.app')

@section('title')
	Settings
@endsection

@section('stylesheet')
	{{ asset('css/dashboard.css') }}
@endsection

@section('content')
<div class="container">
    <div class="main-body">
    	<p class="page-header">
            <span>Settings</span>
    	</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('settings') }}">
            @csrf
            
            @foreach($user as $user)
                <div class="" id="theme">
                    <div class="row">
                		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">Theme</div>
                		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                			<div class="form-group">
        		            	<div class="form-check form-check-inline">
        							<input id="theme" class="form-check-input{{ $errors->has('theme') ? ' is-invalid' : '' }}" type="radio" name="theme" id="theme1" value="0" 
                                        @if($user->theme == '0')
                                            checked
                                        @endif
                                    >
        							<label class="form-check-label" for="theme1">
        								Default
        							</label>
        							<div class="theme-preview"></div>
        						</div>
        						
        		            	<div class="form-check form-check-inline pull-right">
        							<input class="form-check-input" type="radio" name="theme" id="theme2" value="1" 
                                        @if($user->theme == '1')
                                            checked
                                        @endif
                                    >
        							<label class="form-check-label" for="theme2">
        								Dark
        							</label>
        							<div class="theme-preview"></div>
        						</div>

                                @if ($errors->has('theme'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('theme') }}</strong>
                                    </span>
                                @endif
        					</div>
                		</div>
                	</div>
                </div>

                <hr>
                
                <div class="" id="profile">
                    <div class="row">
                		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">Profile</div>
                		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                			<div class="form-group">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" placeholder="Full Name" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" placeholder="Username" required>
                                
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                		</div>
                	</div>
                </div>
            @endforeach

            <hr>

            <div class="offset-md-3 col-md-6 text-center">
                <div class="form-group">
                    <label for="oldPassword">Current Password</label>
                    <input id="oldPassword" type="password" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword" placeholder="Confirm your acccount" required>

                    @if ($errors->has('oldPassword'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('oldPassword') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="saveProfile">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
