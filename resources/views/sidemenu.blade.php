<div class="col-md-2 visible-xs-2">        
    <div class="list-group">
        <a href="{{url('/user')}}" title="User" class="list-group-item {{(url('/user')==url()->current())?'active':''}}"><i class="glyphicon glyphicon-user"></i> User</a>
        <a href="{{url('/user/active')}}" title="Active" class="list-group-item {{(url('/user/active')==url()->current())?'active':''}}"><i class="glyphicon glyphicon-globe"></i> Active</a>
        <a href="{{url('/binding')}}" title="Binding" class="list-group-item {{(url('/binding')==url()->current())?'active':''}}"><i class="glyphicon glyphicon-phone"></i> Binding</a>
    </div>            
</div>        