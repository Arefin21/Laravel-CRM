<!-- Sidebar -->
<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('/') }}asset/assets/img/sidebar-1.jpg">
    {{--        <div class="logo">--}}
    {{--            <a href="member-dashboard.html" class="simple-text logo-normal">--}}
    {{--                <img src="{{ asset('/') }}asset/images/logo.png">--}}
    {{--            </a>--}}
    {{--        </div>--}}

    <div class="sidebar-wrapper">
        <div class="page-wrapper chiller-theme toggled">

            <nav id="sidebar" class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{ route('admin.home') }}" class="simple-text logo-normal">
                        <img src="{{ asset('/') }}asset/images/logo.png">
                    </a>
                </div>
                <div class="sidebar-content">

                    <div class="sidebar-menu">
                        <ul>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-list"></i>
                                    <span>Create Lead</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('admin.leads.create') }}">Create Lead</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.leads.index') }}">Lead List</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-cogs"></i>
                                    <span>Service Type</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('service.create') }}">Service Create </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('service.index') }}">View </a>
                                        </li>
                                        {{-- <li>
                                            <a href="{{ route('unit.index') }}">Unit Type</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('purchasecompany.index') }}">Purchase Company Name</a>
                                        </li> --}}

                                    </ul>
                                </div>
                            </li>


                            {{-- <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Product</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
{{--                                        <li>--}}
{{--                                            <a href="{{ route('purchasecompany.create') }}">Add Category</a>--}}
{{--                                        </li>--}}
                                        {{-- <li>
                                            <a href="{{ route('category.index') }}">All Category</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('product.index') }}">All Product</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}} 
                            {{-- <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Warehouse</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        @foreach(\App\Models\Warehouse::all() as $warehouse)
                                        <li>
                                            <a href="{{ route('warehouse.show',$warehouse->id) }}">{{ $warehouse->name }}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Company Stock</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('companyproduct.create') }}">Add Company Stock</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('companyproduct.index') }}">All Company Stock</a>
                                        </li>
                                    @foreach(\App\Models\Purchasecompany::all() as $purchaseCompany)
                                        <li>
                                            <a href="{{ route('purchasecompany.show',$purchaseCompany->id) }}">{{ $purchaseCompany->name }} Company Stock</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="{{ route('admin.all_order') }}">
                                    <i class="fa fa-globe"></i>
                                    <span>Order List</span>
                                </a>
                            </li> --}}
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-comment"></i>
                                    <span>Comment Status</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('statuses.create') }}">Create</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('statuses.index') }}">View</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-clock"></i>
                                    <span>Recent Lead Issue</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('test.route') }}">View</a>
                                        </li>
                                        {{-- <li>
                                            <a href="{{ route('admin.leads.index') }}">Lead List</a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-user"></i>
                                    <span>Support Admin</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        {{-- <li>
                                            <a href="{{ route('admin.leads.create') }}">Create Lead</a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('supportadmin.leads.index') }}">View</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Create Admin</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('sradd.settings') }}">Admin Registration</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('sr.list') }}">All Admin List</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>




{{--                            <li class="sidebar-dropdown">--}}
{{--                                <a href="#">--}}
{{--                                    <i class="far fa-gem"></i>--}}
{{--                                    <span>Purchase Client</span>--}}
{{--                                </a>--}}
{{--                                <div class="sidebar-submenu">--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <a href="add-purchase-client.html">Add Purchase Client</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="all-purchase-client.html">View Purchase Client</a>--}}
{{--                                        </li>--}}

{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}



                            {{-- <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Income & Expense</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('income.create') }}">Add Income</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('expense.create') }}">Add Expense</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('income.index') }}">View Income & Expense</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Car Rent</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('driver.index') }}">All Driver List</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('route.index') }}">Route List</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('trip.index') }}">Trip List</a>
                                        </li>

                                    </ul>
                                </div>
                            </li> --}}

{{--                            <li>--}}
{{--                                <a href="order-list.html">--}}
{{--                                    <i class="fa fa-globe"></i>--}}
{{--                                    <span>Report</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                </div>

            </nav>
        </div>
    </div>
</div>
<!-- Side Bar -->




