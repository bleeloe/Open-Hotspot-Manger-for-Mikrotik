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
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-10">	                		
	                		<div class="form-group">
	                			<label for="name">Name</label>
	                			<input name="name" autocomplete="off" type="text" required class="form-control" id="name" value="{{old('name',$data->name)}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="pass">Password</label>
	                			<input autocomplete="off"  name="pass" type="password" class="form-control" id="pass" value="{{old('pass')}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="ipaddress">Ipaddress</label>
	                			<input name="ipaddress" type="text" class="form-control" id="ipaddress" value="{{old('ipaddress',$data->ipaddress)}}">
	                		</div>
	                		<div class="form-group">
	                			<label for="is_active">is_active</label>
	                			<input name="is_active" type="text" class="form-control" id="is_active" value="{{old('is_active',$data->is_active)}}">
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
