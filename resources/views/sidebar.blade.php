<div class="col-sm-2 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        @if(Auth::user()->isAdmin())
            <li class="active"><a href="{{url('/admin/products')}}">Products <span class="sr-only">(current)</span></a></li>
            <li><a href="{{url('/admin/categories')}}">Categories</a></li>
            <li><a href="{{url('/admin/users')}}">Users</a></li>
        @endif
    </ul>
</div>