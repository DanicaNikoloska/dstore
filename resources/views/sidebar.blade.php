<div class="col-sm-2 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        @if(Auth::user()->isAdmin())
            <li class="active"><a href="/admin/products">Products <span class="sr-only">(current)</span></a></li>
            <li><a href="/admin/categories">Categories</a></li>
            <li><a href="/admin/users">Users</a></li>
        @endif
    </ul>
</div>