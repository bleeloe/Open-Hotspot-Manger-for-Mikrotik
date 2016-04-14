@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">        
        @include('sidemenu')
        <div class="col-md-10 col-sm-10 col-xs-10">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Binding</strong></div>
                <div id="toolbar">                	
                	<div class="btn-group">
                	<a href="{{url('/binding/create')}}" title="add user" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>	
                	</div>                	
                </div>
				<table data-toggle="table" data-url="{{url('/hotspot/ip-binding')}}" data-pagination="true" data-height="450" data-search="true" data-show-toggle="true" data-show-columns="true" data-trim-on-search="false" data-show-refresh="true" class="table table-striped" data-toolbar="#toolbar">
				    <thead>
				        <tr>
				        	<th data-visible="true" data-sortable="true" data-formatter="df">Delete</th>
				        	<th data-visible="true" data-sortable="true" data-formatter="df1">Edit</th>
							<th data-visible="false" data-sortable="true" data-field="numbers">numbers</th>							
							<th data-visible="true" data-sortable="true" data-field="disabled">disabled</th>							
							<th data-visible="true" data-sortable="true" data-field="mac-address">mac-address</th>							
							<th data-visible="true" data-sortable="true" data-field="comment">comment</th>
							<th data-visible="true" data-sortable="true" data-field="address">address</th>
							<th data-visible="true" data-sortable="true" data-field="to-address">to-address</th>
							<th data-visible="true" data-sortable="true" data-field="type">type</th>
							<th data-visible="true" data-sortable="true" data-field="server">server</th>					
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
		return '<a href="{{url('/binding')}}/'+row.numbers+'/remove" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>';
	};
	function df1(value,row,index){
		return '<a href="{{url('/binding')}}/'+row.numbers+'/edit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i></a>';
	}
</script>
@endsection
