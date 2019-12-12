<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/logo.png" class="brand-image img-circle elevation-3"
           style="opacity: .8; margin-left: 10px">
      <span class="brand-text font-weight-light" style="padding-left: 5px"><strong>Admin IBS Attrack</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 mb-2 ml-2 d-flex">
        <div class="info">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <div class="image pl-1">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <p class="pl-2">
                     Alexander Pierce
                </p>
              </a>
              <ul class="nav nav-treeview text-center m-1">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <form class="form-inline pl-1" action="#" method="#">
                      <button class="btn btn-default text-center pl-0" type="button">Account</button>
                      <button class="btn btn-default text-center pl-2" type="button">Log Out</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dash.index')}}" class="nav-link {{Route::is('dash.index') ? 'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!--i class="right fas fa-angle-left"></i-->
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview {{Route::is('attendance.index','activity.index','leaves.index') ? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Presence
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('attendance.index')}}" class="nav-link {{Route::is('attendance.index') ? 'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Attendance
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('activity.index')}}" class="nav-link {{Route::is('activity.index') ? 'active':''}}">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Activity
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('leaves.index')}}" class="nav-link {{Route::is('leaves.index') ? 'active':''}}">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                    Leaves
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Route::is('employee.index','customer.index','gitcustomerSite.index') ? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.index')}}" class="nav-link {{Route::is('employee.index') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dept_grup.index')}}" class="nav-link {{Route::is('dept_grup.index') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dept.index')}}" class="nav-link {{Route::is('dept.index') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Route::is('customer.index','gitcustomerSite.index') ? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.index')}}" class="nav-link {{Route::is('customer.index') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customerSite.index')}}" class="nav-link {{Route::is('customerSite.index') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Site List</p>
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