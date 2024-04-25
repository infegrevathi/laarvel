<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
         <h5>Sri Ramakirishna <br> Specialty Hospital</h5>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
          {{-- @can('Dashboard Create') --}}
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            {{-- @endcan --}}
           
            {{-- @can('Staff') --}}
            <li class="nav-item nav-category">Manage Staffs</li>
          
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" role="button" aria-expanded="false"
                    aria-controls="tables">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Staffs</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ url('role') }}" class="nav-link">Roles & Permissions</a>
                            </li>

                        <li class="nav-item">
                            <a href="{{ url('assign_role_users') }}" class="nav-link">Assign Roles to Staffs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('user') }}" class="nav-link">All Staffs</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- @endcan --}}
        </ul>
    </div>
</nav>
