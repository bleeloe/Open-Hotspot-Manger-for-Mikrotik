<?php

/* 
 * Cocomas 
 * 
 * Copyright 2014
 * 
 * Developed by Mashary
 */

?>
{{-- @if($errors) --}}
	{{-- @foreach ($errors->all() as $message) --}}
	{{-- <div class="alert alert-danger alert-dismissible" role="alert"> --}}
		{{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
		{{-- <strong>{{trans('cocomas.error')}}!</strong> {{ $message }} --}}
	{{-- </div> --}}
	{{-- @endforeach --}}
{{-- @endif --}}

@if (\Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>{{trans('cocomas.success')}}!</strong> {{ session('message') }}
</div>
@endif

@if (\Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>{{trans('cocomas.error')}}!</strong> {{ session('message-error') }}
</div>
@endif