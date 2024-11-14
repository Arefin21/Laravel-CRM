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
                    <a href="{{ route('subadmin.home') }}" class="simple-text logo-normal">
                        <img src="{{ asset('/') }}asset/images/logo.png">
                    </a>
                </div>
                <div class="sidebar-content">

                    <div class="sidebar-menu">
                        <ul>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>SR Client</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>

                                        <li>
                                            <a href="{{ route('shop.index') }}">View SR Shop</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Warehouse</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        @php
                                            $warehouses = \App\Models\Warehouse::where('id', auth()->user()->warehouse)->get();
                                        @endphp

                                        @if($warehouses->isEmpty())
                                            <li>
                                                <a href="#"> No Warehouse is Assigned</a>
                                               </li>
                                        @else
                                            @foreach($warehouses as $warehouse)
                                                <li>
                                                    <a href="{{ route('warehouse.sr.show', $warehouse->id) }}">{{ $warehouse->name }}</a>
                                                </li>
                                            @endforeach
                                        @endif


                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Order</span>
                                </a>
                                <div class="sidebar-submenu" style="display: none;">
                                    <ul>
                                        <li>
                                            <a href="{{ route('sr.category') }}">New Order</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('sr.all_order') }}">All Order</a>
                                        </li>


                                    </ul>
                                </div>
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

