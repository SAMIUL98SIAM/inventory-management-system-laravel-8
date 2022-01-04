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

            <li class="nav-item has-treeview {{$prefix=='/logos'?'menu-open':''}}">
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

            <li class="nav-item has-treeview {{$prefix=='/communicates'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Communicate Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('communicates.view')}}" class="nav-link {{$route=='communicates.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Communicate</p>
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

            <li class="nav-item has-treeview {{$prefix=='/colors'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Color Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('colors.view')}}" class="nav-link {{$route=='colors.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Color</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/brands'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Brand Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('brands.view')}}" class="nav-link {{$route=='brands.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Brand</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/sizes'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Size Management
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('sizes.view')}}" class="nav-link {{$route=='sizes.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Size</p>
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

            <li class="nav-item has-treeview {{$prefix=='/orders'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Manage Order
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('orders.pending.list')}}" class="nav-link {{$route=='orders.pending.list'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pending Order</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('orders.approved.list')}}" class="nav-link {{$route=='orders.approved.list'?'active':''}}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Approved Order</p>
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </nav>
</aside>
