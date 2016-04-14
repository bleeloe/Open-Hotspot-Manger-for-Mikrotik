@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">        
        @include('sidemenu')
        <div class="col-md-10 col-sm-10 col-xs-10">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Home</strong></div>
                <div class="panel-body">
                    Welcome back Dude!!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
