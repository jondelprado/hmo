<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('http://localhost/hmo/public/coordinator/dashboard') }}" class="brand-link">
    <img src="{{asset('img/logo.png')}}" alt="HMO Logo" class="brand-image img-square elevation-3"><br>
    <span class="brand-text font-weight-light">
      <small>Health Maintenance Organization</small>
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div> --}}
    <div class="info">
      {{-- <a href="#" class="d-block">{{ Auth::user()->name }}</a> --}}
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


      @if (empty($claims_menu))
        @php
          $claims_menu = "";
        @endphp
      @endif

      @if (empty($claims_link))
        @php
          $claims_link = "";
        @endphp
      @endif

      @if (empty($doctor_link))
        @php
          $doctor_link = "";
        @endphp
      @endif

      <li class="nav-item has-treeview {{$claims_menu == "claims-open" ? "menu-open" : " "}}">
        <a href="#" class="nav-link {{$claims_link == "claims-active" ? "active" : " "}}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Claims
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="http://localhost/hmo/public/claims/doctor" class="nav-link {{$doctor_link == "doctor-open" ? "active" : " "}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Doctor</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Patient</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Utilities
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
