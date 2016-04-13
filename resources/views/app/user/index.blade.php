@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">        
        @include('sidemenu')
        <div class="col-md-10 col-xs-10 col-sm-10">
        @include('flash')
            <div class="panel panel-default">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                <div id="toolbar">
                	<a href="{{url('/user/create')}}" title="add user" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
				<table data-toggle="table" data-url="{{url('/hotspot/user')}}" data-pagination="true" data-height="450" data-search="true" data-show-toggle="true" data-show-columns="true" data-trim-on-search="false" data-show-refresh="true" class="table table-striped" data-toolbar="#toolbar">
				    <thead>
				        <tr>
							<th data-visible="false" data-sortable="true" data-field="numbers">#</th>
							<th data-formatter="df">Remove</th>
							<th data-formatter="edit">Edit</th>
							<th data-visible="true" data-sortable="true" data-field="disabled">disabled</th>
							<th data-visible="true" data-sortable="true" data-field="name">name</th>
							<th data-visible="false" data-sortable="true" data-field="password">password</th>
							<th data-visible="true" data-sortable="true" data-field="profile">profile</th>
							<th data-visible="true" data-sortable="true" data-field="server">server</th>
							<th data-visible="true" data-sortable="true" data-field="bytesIn">bytesIn</th>
	            			<th data-visible="true" data-sortable="true" data-field="bytesOut">bytesOut</th>
							<th data-visible="false" data-sortable="true" data-field="address">address</th>
							<th data-visible="true" data-sortable="true" data-field="comment">comment</th>
							<th data-visible="false" data-sortable="true" data-field="limitBytesIn">limitBytesIn</th>
							<th data-visible="false" data-sortable="true" data-field="limitBytesOut">limitBytesOut</th>
							<th data-visible="false" data-sortable="true" data-field="limitBytesTotal">limitBytesTotal</th>
							<th data-visible="false" data-sortable="true" data-field="limitUptime">limitUptime</th>
							<th data-visible="false" data-sortable="true" data-field="packetsIn">packetsIn</th>
							<th data-visible="false" data-sortable="true" data-field="packetsOut">packetsOut</th>
							<th data-visible="false" data-sortable="true" data-field="macAddress">macAddress</th>
							<th data-visible="false" data-sortable="true" data-field="routes">routes</th>
				        </tr>
				    </thead>
				    <tbody>				        
				    </tbody>
				</table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	function df(value,row,index){
		return '<a title="Delete User Permanent" href="{{url('/user/remove')}}/'+row.numbers+'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>';
	}
	function edit(value,row,index){
		return '<a title="Delete User Permanent" href="{{url('/user/')}}/'+row.numbers+'/edit" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i></a>';
	}
</script>
@endsection
