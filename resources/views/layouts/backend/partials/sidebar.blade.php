<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--Dashboad -->
            <li class="nav-item has-treeview menu-open">
                <a href="{{URL::to('admin/dashboard')}}" class="nav-link {{Request::is('admin/dashboard*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <!-- Customer -->
            <li class="nav-item">
                <a href="{{route('customer.index')}}" class="nav-link {{Request::is('admin/customer*') ? 'active' : ''}}">
                    <i class="nav-icon fas  fa-square"></i>
                    <p>Customer</p>
                </a>
            </li>
            <!-- Supplier -->
            <li class="nav-item">
                <a href="{{route('supplier.index')}}" class="nav-link {{Request::is('admin/supplier*') ? 'active' : ''}}">
                    <i class="nav-icon fas  fa-tasks"></i>
                    <p>Supplier</p>
                </a>
            </li>
            <!-- Category -->
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{Request::is('admin/category*') ? 'active' : ''}}">
                    <i class="nav-icon fas  fa-tags"></i>
                    <p>Category</p>
                </a>
            </li>
            <!-- Expense List -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas  fa-minus-square"></i>
                    <p>Expense</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('expense.index')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Expense</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/admin/today_expense')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Today Expense</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/admin/month_expense')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Expense</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/admin/yearly_expense')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Yearly Expense</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Product -->
            <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link {{Request::is('admin/product*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-life-ring"></i>
                    <p>Product</p>
                </a>
            </li>
            <!-- Sell List -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-plus-square"></i>
                    <p>Sell</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('sell.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Sell</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('admin/today_sell')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Today Sell</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Sell</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Yearly Sell</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Total Profit -->
            <li class="nav-item">
                <a href="{{url('admin/totalProfit')}}" class="nav-link {{Request::is('admin/sell*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-life-ring"></i>
                    <p>Total Profit</p>
                </a>
            </li>
            <!-- Stock -->
            <li class="nav-item">
                <a href="{{route('stock.index')}}" class="nav-link {{Request::is('admin/stock*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Stock</p>
                </a>
            </li>
            <!-- Order List -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas  fa-check-square"></i>
                    <p>Order</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('order.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Today Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Yearly Order</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Purchase List -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clone"></i>
                    <p>Purchase</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('purchase.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Today Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Yearly Purchase</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- logout system -->
            <li class="nav-item has-treeview">
                <a class="nav-link" href="#">
                    <i class=" fa-sign-out"></i>
                    <p>{{ Auth::user()->name }}</p>
                    <i class="right fas fa-angle-left"></i>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Log Out</p>
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </nav>
</div>