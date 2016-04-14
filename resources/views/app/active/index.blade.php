@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">        
        @include('sidemenu')
        <div class="col-md-10 col-sm-10 col-xs-10">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Active</strong></div>
                <div class="panel-body">
				<table data-toggle="table" data-url="{{url('/hotspot/active')}}" data-pagination="true" data-height="450" data-search="true" data-show-toggle="true" data-show-columns="true" data-trim-on-search="false" data-show-refresh="true" class="table table-striped">
				    <thead>
				        <tr>
							<th data-visible="false" data-sortable="true" data-field="numbers">numbers</th>
							<th data-visible="true" data-sortable="true" data-formatter="df">#</th>
							<th data-visible="false" data-sortable="true" data-field="radius">radius</th>
							<th data-visible="true" data-sortable="true" data-field="server">server</th>
							<th data-visible="true" data-sortable="true" data-field="user">user</th>
							<th data-visible="true" data-sortable="true" data-field="ipaddress">ipaddress</th>
							<th data-visible="true" data-sortable="true" data-field="uptime">uptime</th>
							<th data-visible="true" data-sortable="true" data-field="loginBy">loginBy</th>
							<th data-visible="true" data-sortable="true" data-field="bytesIn">bytesIn</th>	
							<th data-visible="true" data-sortable="true" data-field="bytesOut">bytesOut</th>
							<th data-visible="true" data-sortable="false" data-field="domain">domain</th>
							<th data-visible="true" data-sortable="true" data-field="idleTime">idleTime</th>
							<th data-visible="true" data-sortable="true" data-field="idleTimeout">idleTimeout</th>
							<th data-visible="true" data-sortable="true" data-field="keepalive_timeout">keepalive_timeout</th>
							<th data-visible="false" data-sortable="true" data-field="limitBytesIn">limitBytesIn</th>
							<th data-visible="false" data-sortable="true" data-field="limitBytesOut">limitBytesOut</th>
							<th data-visible="false" data-sortable="true" data-field="limitBytesTotal">limitBytesTotal</th>
							<th data-visible="false" data-sortable="true" data-field="limitUptime">limitUptime</th>
							<th data-visible="false" data-sortable="true" data-field="packetsIn">packetsIn</th>
							<th data-visible="false" data-sortable="true" data-field="packetsOut">packetsOut</th>
							<th data-visible="false" data-sortable="true" data-field="macAddress">macAddress</th>
							<th data-visible="false" data-sortable="true" data-field="sessionTimeLeft">sessionTimeLeft</th>							
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
		return '<a href="{{url('/active/kill')}}/'+row.numbers+'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>';
	}
</script>
@endsection
