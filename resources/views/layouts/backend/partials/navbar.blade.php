<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="container">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('admin/dashboard')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('admin/product')}}" class="nav-link">Product</a>
            </li>
        </ul>
        <!-- Right Navbar Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{url('admin/setting')}}" class='btn btn-info' style='margin-right:100px;font-size:20px'>
                    <i class="fa fa-cog" aria-hidden="true">
                        <span style="margin-left:6px">Settings</span>
                    </i>
                </a>
            </li>
        </ul>
    </div>
</nav>
