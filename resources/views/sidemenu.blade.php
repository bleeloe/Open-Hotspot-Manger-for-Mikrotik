<div class="col-md-2 col-sm-2">
    <div class="list-group">
    	<div class="list-group-item"><strong>Hotspot</strong></div>    	
        <a href="{{url('/user')}}" title="User" class="list-group-item {{(url('/user')==url()->current())?'active':''}}"><i class="glyphicon glyphicon-user"></i> User</a>
        <a href="{{url('/user/active')}}" title="Active" class="list-group-item {{(url('/user/active')==url()->current())?'active':''}}"><i class="glyphicon glyphicon-globe"></i> Active</a>
        <a href="{{url('/binding')}}" title="Binding" class="list-group-item {{(url('/binding')==url()->current())?'active':''}}"><i class="glyphicon glyphicon-phone"></i> Binding</a>        
    </div>  
    <div class="list-group">
    	<div class="list-group-item"><strong>Router</strong></div>
        <a href="{{url('/router')}}" title="Mirktoik Router" class="list-group-item {{(url('/router')==url()->current())?'active':''}}"><i class="glyphicon glyphicon-computer"></i> Mikrotik</a>
    </div>          
</div>        