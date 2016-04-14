@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">        
        @include('sidemenu')
        <div class="col-md-10 col-xs-10 col-sm-10">
        @include('flash')        
        <form method="post">
        	<input type="hidden" name="_token" value="{!! csrf_token() !!}">        
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Register User</strong></div>
                <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-10">
	                		<div class="form-group">
	                			<label for="name">Name</label>
	                			<input name="name" autocomplete="off" type="text" required class="form-control" id="name" value="{{old('name')}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="password">Password</label>
	                			<input name="password" required type="password" class="form-control" id="password" value="{{old('password')}}" placeholder="">
	                		</div>
	                		<div class="form-group">
	                			<label for="email">Email</label>
	                			<input name="email" type="text" class="form-control" id="email" value="{{old('email')}}">
	                		</div>	                		
	                	</div>
	                </div>
                </div>
                <div class="panel-footer">                	
	                <button type="submit" class="btn btn-default">Save</button>	                
                </div>
            </div>
    	</form>	
        </div>
    </div>
</div>
@endsection
