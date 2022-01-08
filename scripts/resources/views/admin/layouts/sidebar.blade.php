@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Deashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img class="profile-user-img img-fluid img-circle" src="{{!empty(Auth::user()->image)?url('/scripts/public/upload/user_image/'.Auth::user()->image):url('/upload/no_image.jpg/')}}" alt="User profile picture">
        </div>
        <div class="info">
          <a href="{{route('profiles.view')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->role=='Admin')
            <li class="nav-item has-treeview  {{$prefix=='/users'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    User Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('users.view')}}" class="nav-link {{$route=='users.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View User</p>
                    </a>
                  </li>
                </ul>
            </li>
            @endif
            <li class="nav-item has-treeview {{$prefix=='/profiles'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Profile Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('profiles.view')}}" class="nav-link {{$route=='profiles.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Profile</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('profiles.change-password')}}" class="nav-link {{$route=='profiles.change-password'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Change Password</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/logos'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Logo Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('logos.view')}}" class="nav-link {{$route=='logos.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Logo</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/sliders'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Slider Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('sliders.view')}}" class="nav-link {{$route=='sliders.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Slider</p>
                    </a>
                  </li>
                </ul>
            </li>


            <li class="nav-item has-treeview {{$prefix=='/contacts'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Contact Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('contacts.view')}}" class="nav-link {{$route=='contacts.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Contact</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/abouts'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    About Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('abouts.view')}}" class="nav-link {{$route=='abouts.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View About</p>
                    </a>
                  </li>
                </ul>
            </li>


            <li class="nav-item has-treeview {{$prefix=='/suppliers'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Supplier Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('suppliers.view')}}" class="nav-link {{$route=='suppliers.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Supplier</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/customers'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Customer Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('customers.view')}}" class="nav-link {{$route=='customers.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Customer</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/units'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Unit Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('units.view')}}" class="nav-link {{$route=='units.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Unit</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/categories'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Category Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('categories.view')}}" class="nav-link {{$route=='categories.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Category</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/products'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Product Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('products.view')}}" class="nav-link {{$route=='products.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Product</p>
                    </a>
                  </li>
                </ul>
            </li>


            <li class="nav-item has-treeview {{$prefix=='/purchases'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Purchase Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('purchases.view')}}" class="nav-link {{$route=='purchases.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Purchase</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('purchases.pending')}}" class="nav-link {{$route=='purchases.pending'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Approval Purchase</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('daily.purchases.report')}}" class="nav-link {{$route=='daily.purchases.report'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daily Purchase Report</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/invoices'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Invoice Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('invoices.view')}}" class="nav-link {{$route=='invoices.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Invoice</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('invoices.pending')}}" class="nav-link {{$route=='invoices.pending'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Approval Invoice</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('invoices.print.list')}}" class="nav-link {{$route=='invoices.print.list'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Print Invoice</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('daily.invoice.report')}}" class="nav-link {{$route=='daily.invoice.report'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daily Invoice Report</p>
                    </a>
                  </li>
                </ul>
            </li>


            <li class="nav-item has-treeview {{$prefix=='/stocks'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Stock Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('stocks.report')}}" class="nav-link {{$route=='stocks.report'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Stock Report</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('stocks.report.supplier.product.wise')}}" class="nav-link {{$route=='stocks.report.supplier.product.wise'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Product/Supplier Wise Stock</p>
                    </a>
                  </li>

                </ul>
            </li>

        </ul>
    </nav>
</aside>
