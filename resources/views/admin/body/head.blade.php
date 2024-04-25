<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            {{-- <a href="/" target="_blank"><i data-feather="globe"></i> View Live Web</a> --}}
          </div>
        </div>
      </div>
    </form>
    <ul class="navbar-nav">
   
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('backend/assets/images/30x30.png') }}" class="img-responsive" alt="userr">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="{{ asset('backend/assets/images/finance-logo.jpg') }}" class="img-responsive" alt="">
            </div>
            <div class="info text-center">
              <p class="name font-weight-bold mb-0">ACS Admin</p>
              <p class="email text-muted mb-3">acs@gmail.com</p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="{{route('admin.profile')}}" class="nav-link">
                  <i data-feather="user"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.change.password')}}" class="nav-link">
                  <i data-feather="lock"></i>
                  <span>Change Password</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.logout') }}" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>