<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('http://localhost/hmo/public//dashboard') }}" class="brand-link">
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

        @if (empty($maintenance_menu))
          @php
            $maintenance_menu = "";
          @endphp
        @endif

        @if (empty($maintenance_link))
          @php
            $maintenance_link = "";
          @endphp
        @endif

        @if (empty($category_link))
          @php
            $category_link = "";
          @endphp
        @endif

        @if (empty($coverage_link))
          @php
            $coverage_link = "";
          @endphp
        @endif

        @if (empty($services_menu))
          @php
            $services_menu = "";
          @endphp
        @endif

        @if (empty($services_link))
          @php
            $services_link = "";
          @endphp
        @endif

        @if (empty($standard_link))
          @php
            $standard_link = "";
          @endphp
        @endif

        @if (empty($additional_link))
          @php
            $additional_link = "";
          @endphp
        @endif

        @if (empty($room_link))
          @php
            $room_link = "";
          @endphp
        @endif

        @if (empty($requirement_link))
          @php
            $requirement_link = "";
          @endphp
        @endif

        @if (empty($membership_link))
          @php
            $membership_link = "";
          @endphp
        @endif

        @if (empty($pec_link))
          @php
            $pec_link = "";
          @endphp
        @endif

        @if (empty($plan_link))
          @php
            $plan_link = "";
          @endphp
        @endif

        <li class="nav-item has-treeview {{$maintenance_menu == "maintenance-open" ? "menu-open" : " "}}">
          <a href="#" class="nav-link {{$maintenance_link == "maintenance-active" ? "active" : " "}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Maintenance
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="http://localhost/hmo/public/maintenance/category" class="nav-link {{$category_link == "category-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/hmo/public/maintenance/coverage" class="nav-link {{$coverage_link == "coverage-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Coverage</p>
              </a>
            </li>
            <li class="nav-item has-treeview {{$services_menu == "services-open" ? "menu-open" : " "}}">
              <a href="#" class="nav-link {{$services_link == "services-active" ? "active bg-warning" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Services
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="http://localhost/hmo/public/maintenance/services/standard" class="nav-link {{$standard_link == "standard-open" ? "active" : " "}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Standard</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="http://localhost/hmo/public/maintenance/services/additional" class="nav-link {{$additional_link == "additional-open" ? "active" : " "}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Additional</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="http://localhost/hmo/public/maintenance/room" class="nav-link {{$room_link == "room-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Room</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/hmo/public/maintenance/requirement" class="nav-link {{$requirement_link == "requirement-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Requirement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/hmo/public/maintenance/membership" class="nav-link {{$membership_link == "membership-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Membership</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/hmo/public/maintenance/pre-existing-condition" class="nav-link {{$pec_link == "pec-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pre Existing Condition</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/hmo/public/maintenance/plan" class="nav-link {{$plan_link == "plan-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Plan</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- TRANSACTION --}}

        @if (empty($transaction_menu))
          @php
            $transaction_menu = "";
          @endphp
        @endif

        @if (empty($transaction_link))
          @php
            $transaction_link = "";
          @endphp
        @endif

        @if (empty($contract_menu))
          @php
            $contract_menu = "";
          @endphp
        @endif

        @if (empty($contract_link))
          @php
            $contract_link = "";
          @endphp
        @endif

        @if (empty($hospital_link))
          @php
            $hospital_link = "";
          @endphp
        @endif

        @if (empty($company_link))
          @php
            $company_link = "";
          @endphp
        @endif

        @if (empty($member_link))
          @php
            $member_link = "";
          @endphp
        @endif

        <li class="nav-item has-treeview {{$transaction_menu == "transaction-open" ? "menu-open" : " "}}">
          <a href="#" class="nav-link {{$transaction_link == "transaction-active" ? "active" : " "}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Transaction
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav-treeview">
            <li class="nav-item has-treeview {{$contract_menu == "contract-open" ? "menu-open" : " "}}">
              <a href="#" class="nav-link {{$contract_link == "contract-active" ? "active bg-warning" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contract
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="http://localhost/hmo/public/transaction/contract/hospital" class="nav-link {{$hospital_link == "hospital-open" ? "active" : " "}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hospital</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="http://localhost/hmo/public/transaction/contract/company" class="nav-link {{$company_link == "company-open" ? "active" : " "}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Company</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="http://localhost/hmo/public/transaction/contract/member" class="nav-link {{$member_link == "member-open" ? "active" : " "}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Member</p>
                  </a>
                </li>

              </ul>
            </li>
          </ul>

        </li>


        @if (empty($utility_menu))
          @php
            $utility_menu = "";
          @endphp
        @endif

        @if (empty($utility_link))
          @php
            $utility_link = "";
          @endphp
        @endif

        @if (empty($coordinator_link))
          @php
            $coordinator_link = "";
          @endphp
        @endif

        <li class="nav-item has-treeview {{$utility_menu == "utility-open" ? "menu-open" : " "}}">
          <a href="#" class="nav-link {{$utility_link == "utility-active" ? "active" : " "}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Utilities
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav-treeview">
            <li class="nav-item">
              <a href="http://localhost/hmo/public/utilities/coordinator" class="nav-link {{$coordinator_link == "coordinator-open" ? "active" : " "}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Coordinator</p>
              </a>
            </li>
          </ul>

        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>












{{--  --}}
