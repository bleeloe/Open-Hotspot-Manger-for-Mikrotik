@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">        
        @include('sidemenu')
        <div class="col-md-10 col-sm-10 col-xs-10">
        @include('flash')
        <form method="post">
        	<input type="hidden" name="_token" value="{!! csrf_token() !!}">        
            <div class="panel panel-default">
                <div class="panel-heading">User / Create</div>
                <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-10">
	                		<div class="form-group">
	                			<label for="server">Server</label>
	                			<input name="server" type="text" class="form-control" id="server" value="{{old('server',$server)}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="name">Name</label>
	                			<input name="name" autocomplete="off" type="text" required class="form-control" id="name" value="{{old('name',$name)}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="password">Password</label>
	                			<input name="password" type="password" class="form-control" id="password" value="{{old('password')}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="profile">Profile</label>
	                			<input name="profile" type="text" class="form-control" id="profile" value="{{old('profile',$profile)}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="email">Email</label>
	                			<input name="email" type="text" class="form-control" id="email" value="{{old('email',$email)}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="disabled">disabled</label>
	                			<input name="disabled" type="text" class="form-control" id="disabled" value="{{old('disabled',$disabled)}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="comment">Comment</label>
	                			<input name="comment" type="text" class="form-control" id="comment" value="{{old('comment',$comment)}}">
	                		</div>
	                	</div>
	                </div>
                </div>
                <div class="panel-footer">                	
                	<a href="{{url('/user')}}" class="btn btn-default"><i class="gylphicon glyphicon-back"></i> Back</a>
	                <button type="submit" class="btn btn-primary">Save</button>	                
                </div>
            </div>
    	</form>	
        </div>
    </div>
</div>
@endsection
